CREATE TABLE [dbo].[Bids] (
    [BId] INT NOT NULL,
    [Pid] INT NOT NULL,
    PRIMARY KEY CLUSTERED ([BId] ASC),
    CONSTRAINT [FK_Bids_Post] FOREIGN KEY ([Pid]) REFERENCES [dbo].[Post] ([PId])
);


CREATE TABLE [dbo].[Customer] (
    [CId]       INT           IDENTITY (1, 1) NOT NULL,
    [CName]     VARCHAR (50)  NOT NULL,
    [CPhone]    INT           NOT NULL,
    [CAddress]  VARCHAR (200) NOT NULL,
    [CEmail]    VARCHAR (50)  NOT NULL,
    [CPassword] VARCHAR (50)  NOT NULL,
    [CPhoto]    IMAGE         NOT NULL,
    PRIMARY KEY CLUSTERED ([CId] ASC)
);

CREATE TABLE [dbo].[Gives] (
    [GId]  INT IDENTITY (1, 1) NOT NULL,
    [SId]  INT NOT NULL,
    [SPId] INT NOT NULL,
    PRIMARY KEY CLUSTERED ([GId] ASC),
    CONSTRAINT [FK_Gives_Service] FOREIGN KEY ([SId]) REFERENCES [dbo].[Service] ([SId]),
    CONSTRAINT [FK_Gives_ServiceProvider] FOREIGN KEY ([SPId]) REFERENCES [dbo].[ServiceProvider] ([SPId])
);


CREATE TABLE [dbo].[Post] (
    [PId]  INT IDENTITY (1, 1) NOT NULL,
    [SRId] INT NOT NULL,
    [CId]  INT NOT NULL,
    CONSTRAINT [PK_Post] PRIMARY KEY CLUSTERED ([PId] ASC),
    CONSTRAINT [FK_Post_ServiceRequest] FOREIGN KEY ([SRId]) REFERENCES [dbo].[ServiceRequest] ([SRId]),
    CONSTRAINT [FK_Post_Customer] FOREIGN KEY ([CId]) REFERENCES [dbo].[Customer] ([CId])
);


CREATE TABLE [dbo].[Service] (
    [SId]   INT           IDENTITY (1, 1) NOT NULL,
    [Sname] VARCHAR (50)  NOT NULL,
    [SDesc] VARCHAR (250) NOT NULL,
    PRIMARY KEY CLUSTERED ([SId] ASC)
);

CREATE TABLE [dbo].[ServiceProvider] (
    [SPId]       INT           IDENTITY (1, 1) NOT NULL,
    [SPName]     VARCHAR (50)  NOT NULL,
    [SPPhone]    INT           NOT NULL,
    [SPAdddress] VARCHAR (200) NOT NULL,
    [SPEmail]    VARCHAR (50)  NOT NULL,
    [SPPassword] VARCHAR (50)  NOT NULL,
    [SPPhoto]    IMAGE         NOT NULL,
    PRIMARY KEY CLUSTERED ([SPId] ASC)
);

CREATE TABLE [dbo].[ServiceRequest] (
    [SRId]     INT  IDENTITY (1, 1) NOT NULL,
    [SId]      INT  NOT NULL,
    [SRDesc]   TEXT NOT NULL,
    [SRDate]   DATE NOT NULL,
    [LatestBy] DATE NOT NULL,
    PRIMARY KEY CLUSTERED ([SRId] ASC),
    CONSTRAINT [FK_ServiceRequest_Service] FOREIGN KEY ([SId]) REFERENCES [dbo].[Service] ([SId])
);

