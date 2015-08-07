$(document).ready(function() {

   $("table.createForm, table.createTable").on("click",".add",function() {

       $("tr:last-child").clone().appendTo("table");
       $("tr:last-child input, tr:last-child select").each(function(){
           var matches = $(this).attr("name").match(/[0-9]/);
           if (matches) {
               var newstr = $(this).attr("name").replace(/[0-9]/,parseInt(matches[0])+1);

           }
           $(this).attr("name", newstr);
       });

   });

    $("table.createForm, table.createTable").on("click",".del",function() {
//        console.log($("table.createForm").length);
//        if($("table.createForm").rows.length>1) {

            $(this).parents("tr").remove();
//        }

    });

});