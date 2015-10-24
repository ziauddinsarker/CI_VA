<!doctype html>

<html>
<head>
	<title>
		Codeigniter Search
	</title>
	
	<link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("assets/css/main.css"); ?>" rel="stylesheet" type="text/css" />
	<style>
		@font-face {
    font-family:"Prociono";
    src: url("../font/Prociono-Regular-webfont.ttf");
}
html {
    overflow-y: scroll;
}
.container {
    margin: 0 auto;
    max-width: 750px;
    text-align: center;
}
.tt-dropdown-menu, .gist {
    text-align: left;
}
html {
    color: #333333;
    font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 18px;
    line-height: 1.2;
}
.title, .example-name {
    font-family: Prociono;
}
p {
    margin: 0 0 10px;
}
.title {
    font-size: 64px;
    margin: 20px 0 0;
}
.example {
    padding: 30px 0;
}
.example-name {
    font-size: 32px;
    margin: 20px 0;
}
.demo {
    margin: 50px 0;
    position: relative;
}
.typeahead, .tt-query, .tt-hint {
    border: 2px solid #CCCCCC;
    border-radius: 8px 8px 8px 8px;
    font-size: 16px;
    height: 30px;
    line-height: 30px;
    outline: medium none;
    padding: 0px 12px;
    width: 396px;
}
.typeahead {
    background-color: #FFFFFF;
}
.typeahead:focus {
    border: 2px solid #0097CF;
}
.tt-query {
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
    color: #999999;
}
.tt-dropdown-menu {
    background-color: #FFFFFF;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 8px 8px 8px 8px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    margin-top: 12px;
    padding: 8px 0;
    width: 422px;
}
.tt-suggestion {
    font-size: 18px;
    line-height: 24px;
    padding: 3px 20px;
}
.tt-suggestion.tt-cursor {
    background-color: #0097CF;
    color: #FFFFFF;
}
.tt-suggestion p {
    margin: 0;
}
.gist {
    font-size: 14px;
}
.example-twitter-oss .tt-suggestion {
    padding: 8px 20px;
}
.example-twitter-oss .tt-suggestion + .tt-suggestion {
    border-top: 1px solid #CCCCCC;
}
.example-twitter-oss .repo-language {
    float: right;
    font-style: italic;
}
.example-twitter-oss .repo-name {
    font-weight: bold;
}
.example-twitter-oss .repo-description {
    font-size: 14px;
}
.example-sports .league-name {
    border-bottom: 1px solid #CCCCCC;
    margin: 0 20px 5px;
    padding: 3px 0;
}
.example-arabic .tt-dropdown-menu {
    text-align: right;
}
	</style>
</head>
<body>

<div class="container">
	<h1>Search </h1>
	<div class="form-group table-input">
	   <label class="sr-only" for="name">Tablet Name</label>
	   <input type="text" class="form-control typeahead tt-query" autocomplete="off" spellcheck="false" name="name" id="name" placeholder="Enter Brand Name or Generic Name">
	</div>
</div>



<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/typeahead.bundle.min.js'); ?>"></script>

<script>

// Instantiate the Bloodhound suggestion engine
var countries = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: {
        url: '<?php echo base_url().'search/get_brand'; ?>',
        filter: function (countries) {
            return $.map(countries, function (country) {
                return {
                    name: country
                };
            });
        }
    }
});

// Initialize the Bloodhound suggestion engine
countries.initialize();

// Instantiate the Typeahead UI
$('.typeahead').typeahead(null, {
    displayKey: 'name',
    source: countries.ttAdapter()
});


/* 
	$(document).ready(function () {
	 $('.typeahead').typeahead({
		source: function(query) {
		  var result = [];
		 $.ajax({
		  url: "<?php echo base_url().'search/get_brand'; ?>",
		  type: "post",
		  data: "name=" + query,
		  dataType: "json",
		  async: true,
		  success: function(data) {
		   //typeahead.process(data);
		   alert(data);
		   result = data;
		  }
		 });
		 return result;
		}
	   });
	}); */
</script>
</body>
</html>