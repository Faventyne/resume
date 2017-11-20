//$(

    $(".plusminus").on("click",function(){


        if ($('i',this).hasClass("fa-plus")){
            $('i',this).removeClass("fa-plus").addClass("fa-minus");
        } else {
            $('i',this).removeClass("fa-minus").addClass("fa-plus");
        }

    });

    $('.btn-stage').on("change",function(){
        switch($('.btn-stage').val()){
            case "1":
                $('[name="successRate"]').val("3%");
                break;
            case "2":
                $('[name="successRate"]').val("15%");
                break;
            case "3":
                $('[name="successRate"]').val("50%");
                break;
            case "4":
                $('[name="successRate"]').val("75%");
                break;
            case "5":
                $('[name="successRate"]').val("90%");
                break;
            case "6":
                $('[name="successRate"]').val("100%");
                break;
        }

    });


//);
