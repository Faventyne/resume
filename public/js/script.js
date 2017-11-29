//$(

    function dgo(d){
        var allProba=[];
        var e=d.length;
        if (e != 0) {
            //e--;
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Job Opportunity');
            data.addColumn('number', 'Success Rate');
            $.each(d, function(i,d)
            {
                allProba.push(parseInt(d.opp_probability)/100);

            });

            var totalProba = allProba.reduce(function(pv, cv) { return pv + cv; }, 0);
            var jobProba=getJobProba(allProba);

            $.each(d, function(i,d)
            {
                var value=(parseInt(d.opp_probability)/100)* (jobProba/totalProba);
                var name=d.opp_name;
                data.addRows([ [name, value]]);


            });

            if($('tbody').text()==''){
                $('.card-body').append('<table class="table table-striped"><thead><tr><th>My opportunities</th></tr></thead><tbody></tbody></table>');
                $.each(d, function(i,d){
                    if(i<e-1){
                        $('tbody').append('<tr><td>'+d.opp_name+'<button class="navbar-toggler btn btn-info" type="button" data-toggle="exp-collapse" data-target="#exp-opportunity" aria-controls="exp-opportunity" aria-expanded="false" aria-label="Toggle navigation">\n' +
                            '          <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>\n' +
                            '        </button></td></tr>')
                    }
                });
            };

            $('tbody').append('<tr><td>'+d[e-1].opp_name+'<button class="navbar-toggler btn btn-info" type="button" data-toggle="exp-collapse" data-target="#exp-opportunity" aria-controls="exp-opportunity" aria-expanded="false" aria-label="Toggle navigation">\n' +
                '          <span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>\n' +
                '        </button></td></tr>');





            data.addRows([ ["Uncovered",1-jobProba]]);
            //var data = new google.visualization.DataTable(dataTableData);
            var options = {
                //title: 'Chances of getting a job',
                pieSliceText: 'percentage',
                titleTextStyle: {
                    fontSize: 18
                },
                slices:{},
                pieHole: 0.4,
                chartArea: {
                    left: '0%',
                    top: '0%',
                    height:'100%',
                    width:'100%'

                },
                width: ($(document).width()<400) ? 230 : 400,
                height: ($(document).height()<600) ? 240 : (($(document).height()<1000)? 350 : 500),
                //width: 300,
                //height: 240,
                legend : {position: 'right' /*textStyle: {color: 'blue', fontSize: 16}*/}
            };
            options.slices[e]={color: 'lightgrey',
                textStyle: {
                    color: 'black',
                    bold: true
                },
                offset: 0.08
            };
            $('.flow-success').html(function(value){
                return "<h1>" + Math.round(jobProba * 100) + " %</h1>chances of getting hired now";
            });
            var chart = new google.visualization.PieChart(document.getElementById('flow-dashboard'));
            chart.draw(data, options);
        } else {
            $('.flow-dashboard').html("You have no open opportunities yet");
        }
    }

    function getJobProba(p){

        var m = p.length;
        var finalProba = 0;
        for(var i = 0; i < m; i++){
            finalProba += p[i];
        }
        if (m>=2){
            var j = 0;
            for(i = 0; i < m; i++){
                for(j = i+1;j < m;j++){
                    finalProba -= p[i]*p[j];
                }
            }
        }
        if (m>=3){
            var k =0;
            for(i = 0; i < m; i++){
                for(j = i+1;j < m;j++){
                    for(k = j+1;k < m;k++) {
                        finalProba += p[i] * p[j] * p[k];
                    }
                }
            }
        }
        if (m>=4){
            var l =0;
            for(i = 0; i < m; i++){
                for(j = i+1;j<m;j++){
                    for(k = j+1;k < m;k++) {
                        for(l = k+1;l < m;l++){
                            finalProba -= p[i] * p[j] * p[k] * p[l];
                        }
                    }
                }
            }
        }
        if (m>=5){
            var n =0;
            for(i = 0; i < m; i++){
                for(j = i+1;j<m;j++){
                    for(k = j+1;k < m;k++) {
                        for(l = k+1;l < m;l++){
                            for(n = l+1;n < m;n++) {
                                finalProba += p[i] * p[j] * p[k] * p[l] * p[n];
                            }
                        }
                    }
                }
            }
        }
        if (m>=6){
            var o =0;
            for(i = 0; i < m; i++){
                for(j = i+1;j<m;j++){
                    for(k = j+1;k < m;k++) {
                        for(l = k+1;l < m;l++){
                            for(n = l+1;n < m;n++) {
                                for(o = n+1;o < m;o++){
                                    finalProba -= p[i] * p[j] * p[k] * p[l] * p[n] * p[o];
                                }
                            }
                        }
                    }
                }
            }
        }
        if (m>=7){
            var q =0;
            for(i = 0; i < m; i++){
                for(j = i+1;j<m;j++){
                    for(k = j+1;k < m;k++) {
                        for(l = k+1;l < m;l++){
                            for(n = l+1;n < m;n++) {
                                for(o = n+1;o < m;o++){
                                    for(q = o+1;q < m;q++){
                                        finalProba += p[i] * p[j] * p[k] * p[l] * p[n] * p[o] * p[q];
                                    }

                                }
                            }
                        }
                    }
                }
            }
        }
        if (m>=8){
            var r =0;
            for(i = 0; i < m; i++){
                for(j = i+1;j<m;j++){
                    for(k = j+1;k < m;k++) {
                        for(l = k+1;l < m;l++){
                            for(n = l+1;n < m;n++) {
                                for(o = n+1;o < m;o++){
                                    for(q = o+1;q < m;q++){
                                        for(r = q+1;r < m;r++)
                                        finalProba -= p[i] * p[j] * p[k] * p[l] * p[n] * p[o] * p[q] * p[r];
                                    }

                                }
                            }
                        }
                    }
                }
            }
        }
        if (m>=9){
            var s =0;
            for(i = 0; i < m; i++){
                for(j = i+1;j<m;j++){
                    for(k = j+1;k < m;k++) {
                        for(l = k+1;l < m;l++){
                            for(n = l+1;n < m;n++) {
                                for(o = n+1;o < m;o++){
                                    for(q = o+1;q < m;q++){
                                        for(r = q+1;r < m;r++) {
                                            for (s = r + 1; s < m; s++) {
                                                finalProba += p[i] * p[j] * p[k] * p[l] * p[n] * p[o] * p[q] * p[r] * p[s];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return finalProba;
    }

    function isNonZeroUnitProba(n){
        n=parseFloat(n);
        return Number(n) === n && (n*100) % 1 === 0 && n > 0 && n <= 1;
    }

    function isNonZeroIntProba(n){
        n=parseFloat(n);
        return Number(n) === n && n % 1 === 0 && n >=1 && n<= 100;
    }

    function isNonZeroInt(n){
        return Number(n) === n && n % 1 === 0 && n >=1;
    }

    function isCorrectDate(date,type){
        var myDate = date.split("-");
        var d = parseInt(myDate[2],10);
        var m = parseInt(myDate[1],10);
        var y = parseInt(myDate[0],10);
        //new Date(y,m-1,d);
        if(type=="opp-enddate"){
            return (new Date(y,m-1,d).getTime() - new Date().getTime()) < 180*24*3600*1000;
        } else if(type == "opp-startdate"){
            var inputDate = new Date(y,m-1,d);
            var today = new Date();
            return (new Date(y,m-1,d).getTime() - new Date().getTime()) <= 0;
        }
    }
    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(getOpp);


    $(".plusminus").on("click",function(){


        if ($('i',this).hasClass("fa-plus")){
            $('i',this).removeClass("fa-plus").addClass("fa-minus");
        } else {
            $('i',this).removeClass("fa-minus").addClass("fa-plus");
        }

    });



    $('.btn-stage').on("change",function(){
        switch ($('.btn-stage').val()) {
            case "1":
                $('[name="opp-successrate"]').val('3%');
                break;
            case "2":
                $('[name="opp-successrate"]').val('15%');
                break;
            case "3":
                $('[name="opp-successrate"]').val('50%');
                break;
            case "4":
                $('[name="opp-successrate"]').val('80%');
                break;
            case "5":
                $('[name="opp-successrate"]').val('97%');
                break;
            case "6":
                $('[name="opp-successrate"]').val('100%');
                break;
            default:
            $('[name="opp-successrate"]').val('3%');
        }
    });

    $('[name="opp-successrate"]').on("click",function(){
        if($('[name="opp-successrate"]').css('border-color')=='rgb(255, 0, 0)'){
            $('#successrateHelp').remove();
            $('[name="opp-successrate"]').css('border-color','');
        }
    });

    $('[name="opp-candidates"]').on("click",function(){
        if($('[name="opp-candidates"]').css('border-color')=='rgb(255, 0, 0)'){
            $('#candidatesHelp').removeClass("data-error").addClass("text-muted");
            $('#candidatesHelp').text("Leave blank if unknown");
            $('[name="opp-candidates"]').css('border-color','');

        }
    });

    $('[name="opp-startdate"]').on("click",function(){
        if($('[name="opp-startdate"]').css('border-color')=='rgb(255, 0, 0)'){
            $('#datestartHelp').removeClass("data-error").addClass("text-muted");
            $('#datestartHelp').text("Leave blank if unknown");
            $('[name="opp-startdate"]').css('border-color','');

        }
    });

    $('[name="opp-enddate"]').on("click",function(){
        if($('[name="opp-enddate"]').css('border-color')=='rgb(255, 0, 0)'){
            $('#dateendHelp').removeClass("data-error").addClass("text-muted");
            $('#dateendHelp').text("Leave blank if unknown");
            $('[name="opp-enddate"]').css('border-color','');

        }
    });

    //Form errors
    $('[name="opp-submit"]').on("click",function(e){
      e.preventDefault();
      var formOK =true;
      if(!(isNonZeroUnitProba($('[name="opp-successrate"]').val()) || isNonZeroIntProba($('[name="opp-successrate"]').val()))){
          if(!$('#successrateHelp').length){
              $('#successRate').append('<small id="successrateHelp" class="form-text data-error">Please insert a probability between 0 and 100%</small>');
              $('[name="opp-successrate"]').css("border-color","red");
              formOK=false;
          }
      }

      if(!$('[name="opp-candidates"]').val() == "" && !(isNonZeroInt($('[name="opp-candidates"]').val()))){
          $('#candidatesHelp').removeClass("text-muted").addClass("data-error").text('Please insert a valid number of remaining candidates');
          $('[name="opp-candidates"]').css("border-color","red");
          formOK=false;
      }

      if(!$('[name="opp-enddate"]').val() == "" && !isCorrectDate($('[name="opp-enddate"]').val(),"opp-enddate")){
          $('#dateendHelp').removeClass("text-muted").addClass("data-error").text('The opportunity cannot expire after 6 months, choose a more recent date');
          $('[name="opp-enddate"]').css("border-color","red");
          formOK=false;
      }

      if(!$('[name="opp-startdate"]').val() == "" && !isCorrectDate($('[name="opp-startdate"]').val(),"opp-startdate")){
          $('#datestartHelp').removeClass("text-muted").addClass("data-error").text('The opportunity creation date should be today or earlier');
          $('[name="opp-startdate"]').css("border-color","red");
          formOK=false;
      }
      if(formOK==true){
          setOpp();
          $('.plusminus').trigger( "click" );
      }
    });

    function getOpp(){
        $.ajax({
            url: '../public/subopp.php',
            data : { userid : session_id},
            dataType : 'json'
        }).done(function(g){
            dgo(g);
        }).fail(function(req, status, err) {
            console.log('something went wrong', status, err );

        });
    }

    function setOpp(){
        $.ajax({
            url: '../public/subopp.php',
            method:'post',
            data : {'opp-name' : ($('[name="opp-name"]').length==0)?$('[name="opp-name"]').val():$('[name="opp-company"]').val()+", "+$('[name="opp-role"]').val(),
                    'opp-link' : $('[name="opp-link"]').val(),
                    'opp-intref' : $('[name="opp-intref"]').val(),
                    'opp-role' : $('[name="opp-role"]').val(),
                    'opp-department' : $('[name="opp-department"]').val(),
                    'opp-company' : $('[name="opp-company"]').val(),
                    'opp-industry' : $('[name="opp-industry"]').val(),
                    'opp-location' : $('[name="opp-location"]').val(),
                    'opp-stage' : $('[name="opp-stage"]').val(),
                    'opp-successrate' : $('[name="opp-successrate"]').val(),
                    'opp-appdate' : $('[name="opp-appdate"]').val(),
                    'opp-creadate' : $('[name="opp-creadate"]').val(),
                    'opp-enddate' : $('[name="opp-enddate"]').val(),
                    'opp-candidates' : $('[name="opp-candidates"]').val(),
                    'opp-appdate' : $('[name="opp-appdate"]').val()
            },
            dataType : 'json'
            //async : 'false'
        }).done(function(d){
            dgo(d)
        }).fail(function(req, status, err) {
            console.log('something went wrong', status, err );
        });
    }






//);
