//$(

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
        var myDate = date.split("/");
        var d = parseInt(date[0],10);
        var m = parseInt(date[1],10);
        var y = parseInt(date[2],10);
        //new Date(y,m-1,d);
        if(type=="opp-enddate"){
            return (new Date(y,m-1,d) - new Date()) > 180;
        } else if(type == "opp-startdate"){
            return (new Date(y,m-1,d) - new Date()) <= 0;
        }
    }

    $(".plusminus").on("click",function(){


        if ($('i',this).hasClass("fa-plus")){
            $('i',this).removeClass("fa-plus").addClass("fa-minus");
        } else {
            $('i',this).removeClass("fa-minus").addClass("fa-plus");
        }

    });



    $('.btn-stage').on("change",function(){
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

    //Form errors
    $('[name="opp-submit"]').on("click",function(e){
      e.preventDefault();
      if(!(isNonZeroUnitProba($('[name="opp-successrate"]').val()) || isNonZeroIntProba($('[name="opp-successrate"]').val()))){
          if(!$('#rateHelp').length){
              $('#successRate').append('<small id="successrateHelp" class="form-text data-error">Please insert a probability between 0 and 100%</small>');
              $('[name="opp-successrate"]').css("border-color","red");
          }
      }

      if(!(isNonZeroInt($('[name="opp-candidates"]').val()))){
          $('#candidatesHelp').removeClass("text-muted").addClass("data-error").text('Please insert a valid number of remaining candidates');
          $('[name="opp-candidates"]').css("border-color","red");
      }

      if(!$('[name="opp-enddate"]').val() == "" && !isCorrectDate($('[name="opp-enddate"]').val()),"opp-enddate"){
          $('#dateendHelp').removeClass("text-muted").addClass("data-error").text('The opportunity cannot expire after 6 months, choose a more recent date');
          $('[name="opp-enddate"]').css("border-color","red");
      }

      if(!$('[name="opp-startdate"]').val() == "" && !isCorrectDate($('[name="opp-startdate"]').val()),"opp-startdate"){
          $('#datestartHelp').removeClass("text-muted").addClass("data-error").text('The opportunity creation date should be today or earlier');
          $('[name="opp-startdate"]').css("border-color","red");
      }
    });







//);
