<!DOCTYPE html>
<html>
    <head>
        <title>Search</title>
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <style>
            /* ========================== BEGIN course search css */

            .tt-dropdown-menu {
                text-align: left;
                height: 210px;
                overflow-y: auto;
            }

            .title,
            .course-title {
                font-family: "petitalightregular";
            }

            .title {
                margin: 20px 0 0 0;
                font-size: 64px;
            }

            .course-title {
                margin: 20px 0;
                font-size: 32px;
            }

            .demo {
                position: relative;
                *z-index: 1;
                margin-top: 30px;
            }

            .typeahead,
            .tt-query,
            .tt-hint {
                width: 440px;
                height: 26px;
                padding-left: 10px;
                font-size: 14px;
                line-height: 26px;
                border: 2px solid #E4E4E4;
                -webkit-border-radius: 6px;
                -moz-border-radius: 6px;
                border-radius: 6px;
                outline: none;
            }

            .typeahead {
                background-color: #fff;
            }

            .tt-query {
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }

            /*new */

            .typeahead,
            .tt-input,
            .tt-hint {
                width: 440px;
                height: 26px;
                padding-left: 10px;
                font-size: 14px;
                line-height: 26px;
                border: 2px solid #E4E4E4;
                -webkit-border-radius: 6px;
                -moz-border-radius: 6px;
                border-radius: 6px;
                outline: none;
            }

            .tt-input {
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }
            /* end */

            .tt-hint {
                color: #999
            }

            .tt-dropdown-menu {
                width: 452px;
                margin-top: 12px;
                padding: 8px 0;
                background-color: #fff;
                border: 1px solid #ccc;
                border: 1px solid rgba(0, 0, 0, 0.2);
                -webkit-border-radius: 6px;
                -moz-border-radius: 6px;
                border-radius: 6px;
            }

            .tt-suggestion {
                padding: 3px 20px;
                font-size: 18px;
                line-height: 24px;
            }

            .tt-suggestion.tt-is-under-cursor {
                color: #fff;
                background-color: #f5f3f3;
            }

            /* new see https://github.com/twitter/typeahead.js/blob/master/doc/migration/0.10.0.md#precompiled-templates-are-now-required */
            .tt-suggestion.tt-cursor {
                color: #fff;
                background-color: #f5f3f3;
            }
            /* end */

            .tt-suggestion p {
                margin: 0;
            }

            .course_lookup .tt-suggestion {
                padding: 8px 20px;
            }

            .course_lookup .tt-suggestion + .tt-suggestion {
                border-top: 1px solid #ccc;
            }

            .course_lookup .course_area {
                float: right;
                font-size: 14px !important;
                text-transform: lowercase;
                color:#aaaaaa !important;
            }

            .course_lookup .course_title {
                font-size:16px !important;
            }

            .course_lookup .course_description {
                font-size: 14px !important;
                text-transform: lowercase;
                margin-top: 5px;
                margin-bottom:5px;
            }

            /* ========================== END course search css */
        </style>
    </head>
<body>

<div class="container">
    <article class="row">
        <h5>Enter Name</h5>
        <div class="row">
            <div class="col-lg-8">
                <div id="remote">
                    <input type="text" class="form-control typeahead" name="office">
                </div>
            </div>
        </div>
    </article>

    <article class="row">
        <p>Type "title01" or "area01" for an example:</p>
        <div class="course_lookup">
            <div class="demo">
                <input class="typeahead" type="text" placeholder="Enter subject or subject area">
            </div>
        </div>
    </article>




</div>




    <script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/typeahead.jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bloodhound.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/hogan-3.0.2.min.js'); ?>"></script>

    <script>
        var countries = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            // url points to a json file that contains an array of country names, see
            // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
            prefetch: '<?php echo base_url().'c_search/c_get_all'; ?>'
        });

        // passing in `null` for the `options` arguments will result in the default
        // options being used
        $('#remote .typeahead').typeahead(null, {
            name: 'countries',
            source: countries
        });
    </script>
    <script>
        function searchReadyFunction() {
            $('.course_lookup .typeahead').typeahead({
                name: 'courses',
                valueKey: 'course_title',
                local: [
                    { "course_area": "Area01", "course_title": "title01", "course_description": "Description text 01", "tokens":["title01","Area01"]},
                    { "course_area": "Area02", "course_title": "title02", "course_description": "Description text 02", "tokens":["title02", "Area02"]},
                    { "course_area": "Area03", "course_title": "title03", "course_description": "Description text 03", "tokens":["title03","Area03"]},
                    { "course_area": "Area02", "course_title": "title04", "course_description": "Description text 04", "tokens":["title04","Area02"]},
                    { "course_area": "Area02", "course_title": "title05", "course_description": "Description text 05", "tokens":["title05","Area02"]},
                    { "course_area": "Area04", "course_title": "title06", "course_description": "Description text 06", "tokens":["title06", "Area04"]},
                    { "course_area": "Area05", "course_title": "title07", "course_description": "Description text 07", "tokens":["title07", "Area05"]}
                ],
                template: [
                    '<p class="course_area">{{course_area}}</p>',
                    '<p class="course_title">{{course_title}}</p>',
                    '<p class="course_description">{{course_description}}</p>'
                ].join(''),
                engine: Hogan
                //templates: {
                //suggestion: function (data) { return compiled_template.render(data); }
                //}
            }).on('typeahead:selected', function(event, selection) {
                var course_name = selection.course_title.toLowerCase();
                // ...
            });
        }

        searchReadyFunction();
    </script>


</body>
</html>


