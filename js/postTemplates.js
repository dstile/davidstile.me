var Lifeposts = {
			//This function will define where we need to go to get the post information
			init: function(config) {
					//this referes to object itself - here being 'Lifeposts'
					//need to include some lines for querying the database with Ajax if javascript is enabled
					this.headerTemplate = config.headerTemplate;
					this.postTemplate = config.postTemplate;
					this.container = config.container;
					this.header=config.header;
					//queried information that was returned
					this.data = config.data;
					//section header information
					this.header = config.header;
					//This needs to contain ajax calls to db for any new selections that occur???
					this.fetch();
				},

				attachTemplate: function(template, data) {
				//Compiles the JSON data and populates the Handlebars template
				var template = Handlebars.compile(template);
				//Attaches populated template to the DOM
				this.container.append(template(data));
			},

			//This function will use AJAX to pull the information -->maybe in JSON form
			fetch: function() {
				var self = this;
				//$.ajax(dBinfo, function(data){//The data is what gets returned as the object from the dataBase
					//use $.map to sort through all results returned and only pull out what we need

					
					self.lifeHeader = {
						sectionHeader: self.header.headerText
					};
					self.lifeData = $.map(this.data, function(instance) {//the callback pulls in each sub object within data.results.  I called this instance to make it easier to see
						return {
							posthead: instance.posthead,
							datesequence: instance.datesequence,
							picture: instance.picture,
							description: instance.description,
							media: instance.media
						};
					});

					self.attachTemplate(self.headerTemplate, self.lifeHeader);
					self.attachTemplate(self.postTemplate, self.lifeData);
				}
			};


var Workposts = {
			//This function will define where we need to go to get the post information
			init: function(config) {
					//this referes to object itself - here being 'Lifeposts'
					//need to include some lines for querying the database with Ajax if javascript is enabled
					this.headerTemplate = config.headerTemplate;
					this.postTemplate = config.postTemplate;
					this.container = config.container;
					this.header=config.header;
					//queried information that was returned
					this.data = config.data;
					//section header information
					this.header = config.header;
					//This needs to contain ajax calls to db for any new selections that occur???
					this.fetch();
				},

				attachTemplate: function(template, data) {
				//Compiles the JSON data and populates the Handlebars template
				var template = Handlebars.compile(template);
				//Attaches populated template to the DOM
				this.container.append(template(data));
			},

			//This function will use AJAX to pull the information -->maybe in JSON form
			fetch: function() {
				var self = this;
				//$.ajax(dBinfo, function(data){//The data is what gets returned as the object from the dataBase
					//use $.map to sort through all results returned and only pull out what we need
					self.workHeader = {
						sectionHeader: self.header
					};

					self.workData = $.map(this.data, function(instance) {//the callback pulls in each sub object within data.results.  I called this instance to make it easier to see
						return {
							compImg: instance.worklogo,
							compName: instance.companyname,
							compPosition: instance.position,
							compRole: instance.role,
							compTimeframe: instance.timeframe
						};
					});
					
					self.attachTemplate(self.headerTemplate, self.workHeader);
					self.attachTemplate(self.postTemplate, self.workData);
				}
			};
