# CS 484: Project Part 1
# Team members: Brandon Z. Lujan
#               Brianna Moffett
#               Ziad Arafat

# Creating table for video.
create table Video (
	videoCode		int unique,
	videoLength		int,
    primary key (videoCode)
);

# Creating table for model.
create table Model (
	modelNo		char(10) unique,
    width		numeric(6, 2),
    height		numeric(6, 2),
    weight		numeric(6, 2),
    depth		numeric(6, 2),
    screenSize	numeric(6, 2),
    primary key (modelNo) 

);

# Creating table for site.
create table Site (
	siteCode	int unique,
    type		varchar(16),
    address		varchar(100),
    phone		varchar(16),
    primary key (siteCode),
    # Ensures type is only in a bar or a restaurant.
    constraint CHK_type check (type in ('bar', 'restaurant'))
);

# Creating table for digital display.
create table DigitalDisplay (
	serialNo			char(10) unique,
    schedulerSystem		char(10),
    modelNo				char(10),
    primary key (serialNo),
    foreign key (modelNo) references Model (modelNo) ON UPDATE CASCADE ON DELETE SET NULL,
    # Validates scheduler system to be random, smart, or virtue.
    constraint CHK_scheduler_system check (schedulerSystem in ('Random', 'Smart', 'Virtue'))
);

# Creating table for client.
create table Client (
	clientId	int unique,
    name		varchar(40),
    phone		varchar(16),
    address		varchar(100),
    primary key (clientId)
);

# Creating table for technical support.
create table TechnicalSupport (
	empId		int unique,
    name		varchar(40),
    gender		char(1),
    primary key (empId),
    # Validates that gender entered is M Male, F Female, or O Other (to be inclusive).
    constraint CHK_Gender_techsupport check (gender in ('M', 'F', 'O'))
);

# Creating table for administrator.
create table Administrator (
	empId		int unique,
    name		varchar(40),
    gender		char(1),
    primary key (empId),
    # Validates that gender entered is M Male, F Female, or O Other (to be inclusive).
    constraint CHK_Gender_admin check (gender in ('M', 'F', 'O'))
);

# Creating table for salesman.
create table Salesman (
	empId		int unique,
    name		varchar(40),
    gender		char(1),
    primary key (empId),
    # Validates that gender entered is M Male, F Female, or O Other (to be inclusive).
    constraint CHK_Gender_sales check (gender in ('M', 'F', 'O'))
);

# Creating table for airtime package.
create table AirtimePackage (
	packageId		int unique,
    class			varchar(16),
    startDate		date,
    lastDate		date,
    frequency		int,
    videoCode		int,
    primary key (packageId),
    # Validates that the lastDate is always after the startDate.
    constraint CHK_date_entry check (lastDate >= startDate),
    # Validates the package class to three options.
    constraint CHK_class check (class in ('economy', 'whole day', 'golden hours'))
);

# Creating table for admin work hours.
create table AdmWorkHours (
	empId	int,
    day		date,
    hours	numeric(4, 2),
    foreign key (empId) references Administrator (empId) ON UPDATE CASCADE ON DELETE SET NULL
);

# Creating table for broadcasts.
create table Broadcasts (
	videoCode	int,
    siteCode	int,
    foreign key (videoCode) references Video (videoCode) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key (siteCode) references Site (siteCode) ON UPDATE CASCADE ON DELETE CASCADE
);

# Creating table for administers.
create table Administers (
	empId		int,
	siteCode	int,
    foreign key (empId) references Administrator (empId),
    foreign key (siteCode) references Site (siteCode) ON UPDATE CASCADE ON DELETE CASCADE
);

# Creating table for specializes.
create table Specializes (
	empId		int,
    modelNo		char(10),
    foreign key (empId) references TechnicalSupport( empId),
    foreign key (modelNo) references Model (modelNo) ON UPDATE CASCADE ON DELETE CASCADE
);

# Creating table for purchases.
create table Purchases (
	clientId		int,
    empId			int,
    packageId		int,
    commissionRate	numeric(4, 2),
    foreign key (clientId) references Client (clientId),
    foreign key (empId) references Salesman (empId),
    foreign key (packageId) references AirtimePackage (packageId) ON UPDATE CASCADE ON DELETE CASCADE
);

# Creating table for locates.
create table Locates (
	serialNo	char(10),
    siteCode	int,
    foreign key (serialNo) references DigitalDisplay (serialNo)  ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key (siteCode) references Site (siteCode) 
);