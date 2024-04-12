from flask import Flask, render_template, request
import qrcode
import os

app = Flask(__name__)

def generate_qr(username, phone_number, email):
    # Combine username, phone number, and email into a single string
    data = f"Username: {username}\nPhone Number: {phone_number}\nEmail: {email}"
    
    # Generate QR code
    qr = qrcode.QRCode(
        version=1,
        error_correction=qrcode.constants.ERROR_CORRECT_L,
        box_size=10,
        border=4,
    )
    qr.add_data(data)
    qr.make(fit=True)

    # Create an image from the QR code data
    img = qr.make_image(fill_color="black", back_color="white")
    
    # Save the image with a unique filename
    filename = f"{username}_qr.png"
    img.save(os.path.join("static", filename))  # Save in the 'static' folder
    return filename

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        username = request.form['username']
        phone_number = request.form['phone_number']
        email = request.form['email']
        
        #Generates the QR Code containing user/participant information
        qr_filename = generate_qr(username, phone_number, email)
        
        # Render template with QR code filename
        return render_template('result.html', username=username, phone_number=phone_number, email=email, qr_filename=qr_filename)
    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)
