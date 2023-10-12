-- USE PortfolioProject

/* Chances of death after contracting covid-19 */
Select Location, Date, total_cases, total_deaths, ((total_deaths/total_cases) * 100) as DeathPercentage
From PortfolioProject..CovidDeaths
Where Location like '%singapore'
order by 1,2

/* Percentage of Infected */
Select Location, Date, Population, total_cases, ((total_cases/Population) * 100) as Covid_Infected_InSG
From PortfolioProject..CovidDeaths
Where Location like '%singapore'
order by 1,2

/* Countries with Highest Infection Rate */
Select Location, Population, MAX(total_cases) as HighestInfectionCount, (MAX(total_cases/Population) * 100) as PercentagePopulationInfected
From PortfolioProject..CovidDeaths
group by location, population
order by PercentagePopulationInfected desc


/* Country's total deathcount */
Select Location, MAX(cast(total_deaths as int)) as TotalDeaths
From PortfolioProject..CovidDeaths
where continent is NOT NULL
group by location
order by TotalDeaths desc

/* Each continent's total deathcount */
Select continent, MAX(cast(total_deaths as int)) as TotalDeaths
From PortfolioProject..CovidDeaths
where continent is not NULL
group by continent
order by TotalDeaths desc

/* Global */
Select SUM(Population) as TotalPopulation, SUM((new_cases)) as TotalCases, SUM(cast(new_deaths as int)) as TotalDeaths, (SUM(cast(new_deaths as int))/SUM(new_cases))* 100 as DeathPercentage
From PortfolioProject..CovidDeaths
where continent is not NULL
order by 1,2


/* Total population in the world who has been vaccinated */
-- Using CTE to perform Calculation on Partition By in previous query

With PopVac (Continent, Location, Date, Population, new_vaccinations, PeopleVaccinated)
as
(
Select cd.continent, cd.location, cd.date, cd.population, cv.new_vaccinations,
SUM(cast(cv.new_vaccinations as int)) over (Partition by cd.location order by cd.location, cd.date) 
as PeopleVaccinated
from PortfolioProject..CovidDeaths cd
join PortfolioProject..CovidVaccinations cv
	on cd.location = cv.location
	and cd.date = cv.date
where cd.continent is NOT NULL
)
Select *, (PeopleVaccinated/Population)*100
from PopVac

-- Drop Table if exists #PercentPopVac
Create Table #PercentPopVac
(
Continent nvarchar(255),
Location nvarchar(255),
Date datetime,
Population numeric,
New_vaccinations numeric,
PeopleVaccinated numeric
) 

Insert into #PercentPopVac
Select cd.continent, cd.location, cd.date, cd.population, cv.new_vaccinations,
SUM(cast(cv.new_vaccinations as int)) over (Partition by cd.location order by cd.location, cd.date) 
as PeopleVaccinated
from PortfolioProject..CovidDeaths cd
join PortfolioProject..CovidVaccinations cv
	on cd.location = cv.location
	and cd.date = cv.date
where cd.continent is NOT NULL

Select *, (PeopleVaccinated/Population)*100
from #PercentPopVac

/* Creating View to store data for visualization */
Create View PercentagePopVac as
Select cd.continent, cd.location, cd.date, cd.population, cv.new_vaccinations,
SUM(cast(cv.new_vaccinations as int)) over (Partition by cd.location order by cd.location, cd.date) 
as PeopleVaccinated
from PortfolioProject..CovidDeaths cd
join PortfolioProject..CovidVaccinations cv
	on cd.location = cv.location
	and cd.date = cv.date
where cd.continent is NOT NULL

Select * 
From PercentagePopVac
