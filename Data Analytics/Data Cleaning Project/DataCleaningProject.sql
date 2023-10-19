Select * from PortfolioProject..NashvilleHousing

-- Standardizing Date Format

Select SaleDateConverted, CONVERT(Date, SaleDate) as AfterSaleDateConvert
from PortfolioProject..NashvilleHousing

/* Query does not update the column */
Update NashvilleHousing
Set SaleDate = CONVERT(Date, SaleDate)

/* Add a new column with Converted Date */
Alter Table NashvilleHousing
Add SaleDateConverted Date;

Update NashvilleHousing
Set SaleDateConverted = CONVERT(Date, SaleDate)



-- Populate Property Address Data

Select a.ParcelID, a.PropertyAddress, b.ParcelID, b.PropertyAddress, ISNULL(a.PropertyAddress, b.PropertyAddress)
From PortfolioProject..NashvilleHousing as a
Join PortfolioProject..NashvilleHousing as b
	on a.ParcelID = b.ParcelID
	and a.[UniqueID ]<>b.[UniqueID ]
Where a.PropertyAddress is null

Update a
Set PropertyAddress = ISNULL(a.PropertyAddress, b.PropertyAddress)
From PortfolioProject..NashvilleHousing as a
Join PortfolioProject..NashvilleHousing as b
	on a.ParcelID = b.ParcelID
	and a.[UniqueID ]<>b.[UniqueID ]
Where a.PropertyAddress is null



-- Separating address into Individual Columns (Address, City, State)

Select PropertyAddress 
From PortfolioProject..NashvilleHousing

Select 
SUBSTRING(PropertyAddress, 1, CHARINDEX(',', PropertyAddress)-1) as Address,
SUBSTRING(PropertyAddress, CHARINDEX(',', PropertyAddress)+1, LEN(PropertyAddress)) as Address
From PortfolioProject..NashvilleHousing

USE PortfolioProject

Alter Table NashvilleHousing
Add PropertySplitAddress nvarchar(255);

Update NashvilleHousing
Set PropertySplitAddress = SUBSTRING(PropertyAddress, 1, CHARINDEX(',', PropertyAddress)-1)

Alter Table NashvilleHousing
Add PropertySplitCity nvarchar(255);

Update NashvilleHousing
Set PropertySplitCity = SUBSTRING(PropertyAddress, CHARINDEX(',', PropertyAddress)+1, LEN(PropertyAddress))


Select 
PARSENAME(REPLACE(OwnerAddress, ',', '.'), 3) as OwnerSplitAddress,
PARSENAME(REPLACE(OwnerAddress, ',', '.'), 2) as OwnerSplitCity,
PARSENAME(REPLACE(OwnerAddress, ',', '.'), 1) as OwnerSplitState
From PortfolioProject..NashvilleHousing


-- Change Y and N to Yes and No in "SoldAsVacant" Field

Select distinct(SoldAsVacant), COUNT(SoldAsVacant) as NumberOfData
From PortfolioProject..NashvilleHousing
group by SoldAsVacant
order by 2

Select SoldAsVacant
, CASE When SoldAsVacant = 'Y' Then 'Yes'
	   When SoldAsVacant = 'N' Then 'No'
	   ELSE SoldAsVacant
	   END
From PortfolioProject..NashvilleHousing

Update NashvilleHousing
SET SoldAsVacant = CASE When SoldAsVacant = 'Y' Then 'Yes'
	   When SoldAsVacant = 'N' Then 'No'
	   ELSE SoldAsVacant
	   END

-- Remove Duplicates

/* Identifying Duplicates */
WITH RowNumCTE AS(
Select *,
	ROW_NUMBER() OVER (
	PARTITION BY ParcelID,
				 PropertyAddress,
				 SalePrice,
				 SaleDate,
				 LegalReference
				 ORDER BY 
					UniqueID
					) row_num
From PortfolioProject..NashvilleHousing 
)
Select * 
from RowNumCTE
where row_num > 1

/* Removing Duplicates */
WITH RowNumCTE AS(
Select *,
	ROW_NUMBER() OVER (
	PARTITION BY ParcelID,
				 PropertyAddress,
				 SalePrice,
				 SaleDate,
				 LegalReference
				 ORDER BY 
					UniqueID
					) row_num
From PortfolioProject..NashvilleHousing 
)
DELETE 
from RowNumCTE
where row_num > 1


-- Deleting Unused Columns

Select * 
From PortfolioProject..NashvilleHousing

Alter Table PortfolioProject..NashvilleHousing
DROP COLUMN OwnerAddress, TaxDistrict, PropertyAddress, SaleDate