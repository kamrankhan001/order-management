$(document).ready(function(){

    $("#pizzaform").submit(function(e){
        e.preventDefault();
        var datastring = $("#pizzaform").serialize();
        $.ajax({
            url: "../logic/ajax.php",
            type: "POST",
            data: datastring,
            dataType: 'json',
            success: function(reps){
                $("#row").append(reps[0]);
                $("#total_price").html(reps[1]);
            },
            error: function(reps){
                console.log(reps)
            }
        });
    });

    $("#friesform").submit(function(e){
        e.preventDefault();
        var datastring = $("#friesform").serialize();
        $.ajax({
            url: "../logic/ajax.php",
            type: "POST",
            data: datastring,
            dataType: 'json',
            success: function(reps){
                $("#row").append(reps[0]);
                $("#total_price").html(reps[1]);
            },
            error: function(reps){
                console.log(reps)
            }
        });
    });

    $("#dranksform").submit(function(e){
        e.preventDefault();
        var datastring = $("#dranksform").serialize();
        $.ajax({
            url: "../logic/ajax.php",
            type: "POST",
            data: datastring,
            dataType: 'json',
            success: function(reps){
                $("#row").append(reps[0]);
                $("#total_price").html(reps[1]);
            },
            error: function(reps){
                console.log(reps)
            }
        });
    });

});