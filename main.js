// MANAGIT CLIENT section-------------------------

  $(document).ready(function(){  

       $('#add').click(function(){  
            $('#insert').val("Insert");  
            $('#insert_form')[0].reset();  
       });  
       $(document).on('click', '.edit_data', function(){  
            var client_id = $(this).attr("id");  
            $.ajax({  
                 url:"fetch.php",  
                 method:"POST",  
                 data:{client_id:client_id},  
                 dataType:"json",  
                 success:function(data){  
                      $('#name').val(data.nom);  
                      $('#type_client').val(data.type_client);  
                      $('#telephone').val(data.telephone);  
                      $('#email').val(data.email);  
                      $('#remarque').val(data.remarque); 
                      $('#client_id').val(data.id);  
                      $('#insert').val("Update");  
                      $('#add_data_Modal').modal('show');  
                 }  
            });  
       });  
       $('#insert_form').on("submit", function(event){  
            event.preventDefault();  
            if($('#name').val() == "")  
            {  
                 alert("Name is required");  
            }  
            else if($('#type_client').val() == '')  
            {  
                 alert("Type Client is required");  
            }  
            else if($('#telephone').val() == '')  
            {  
                 alert("Telephone is required");  
            }  
            else if($('#email').val() == '')  
            {  
                 alert("Email is required");  
            }  
            else if($('#remarque').val() == '')  
            {  
                 alert("Remarque is required");  
            } 
            else  
            {  
                 $.ajax({  
                      url:"insert.php",  
                      method:"POST",  
                      data:$('#insert_form').serialize(),  
                      beforeSend:function(){  
                           $('#insert').val("Inserting");  
                      },  
                      success:function(data){  
                           $('#insert_form')[0].reset();  
                           $('#add_data_Modal').modal('hide');  
                           $('#client_table').html(data);  
                      }  
                 });  
            }  
       });  
       $(document).on('click', '.view_data', function(){  
            var client_id = $(this).attr("id");  
            if(client_id != '')  
            {  
                 $.ajax({  
                      url:"select.php",  
                      method:"POST",  
                      data:{client_id:client_id},  
                      success:function(data){  
                           $('#client_detail').html(data);  
                           $('#dataModal').modal('show');  
                      }  
                 });  
            }            
       }); 
//---------------------RE TRAITEMENT ----------------

$('#add_poste').click(function(){  
     $('#insert_poste').val("Insert");  
     $('#insert_form_poste')[0].reset();  
});  
$(document).on('click', '.edit_data_poste', function(){  
     var poste_id = $(this).attr("id");  
     $.ajax({  
          url:"fetch.php",  
          method:"POST",  
          data:{poste_id:poste_id},  
          dataType:"json",  
          success:function(data){  
               $('#poste').val(data.poste);  
               $('#enterprise').val(data.enterprise);  
               $('#note').val(data.note);  
               $('#statut').val(data.statut);  
               $('#link').val(data.link); 
               $('#poste_id').val(data.id);  
               $('#insert_poste').val("Update");  
               $('#add_data_Modal_Poste').modal('show');  
          }  
     });  
});  

$('#insert_form_poste').on("submit", function(event){  
     event.preventDefault();  
     if($('#poste').val() == "")  
     {  
          alert("Poste is required");  
     }  
     else if($('#enterprise').val() == '')  
     {  
          alert("enterprise is required");  
     }  
     else if($('#note').val() == '')  
     {  
          alert("Note is required");  
     }  
     else if($('#statut').val() == '')  
     {  
          alert("Statut is required");  
     }  
     else if($('#link').val() == '')  
     {  
          alert("Link is required");  
     } 
     else  
     {  
          $.ajax({  
               url:"insert_poste.php",  
               method:"POST",  
               data:$('#insert_form_poste').serialize(),  
               beforeSend:function(){  
                    $('#insert_poste').val("Inserting");  
               },  
               success:function(data){  
                    $('#insert_form_poste')[0].reset();  
                    $('#add_data_Modal_Poste').modal('hide');  
                    $('#poste_table').html(data);  
               }  
          });  
     }  
});  
$(document).on('click', '.view_data_poste', function(){  
     var poste_id = $(this).attr("id");  
     if(poste_id != '')  
     {  
          $.ajax({  
               url:"select.php",  
               method:"POST",  
               data:{poste_id:poste_id},  
               success:function(data){  
                    $('#poste_detail').html(data);  
                    $('#dataModalPoste').modal('show');  
               }  
          });  
     }            
}); 

// all-date-id -----------------
     $(".all-date-id").on({
          mouseenter: function(){
               $(this).css({
                    color: 'green',
                    'font-weight': 'bold'
                    
               });
          },
          mouseleave: function(){
               $(this).css({
                    color: 'black',
                    'font-weight': 'normal'
               });
          },

          click: function(){
               $(this).css({
                    color: 'red',
                    'font-weight': 'bold'
               });
          }
     });




//jquery learning-----------------------------
     

      $("#hide").click(function(){
          $("#aside_text").hide();
      });
      $("#show").click(function(){
          $("#aside_text").show();
      });
      $("#toggle").click(function(){
          $("#aside_text").toggle();
      });
      $("#getatt").click(function(){
           alert($("#hide").attr("class"));
      });
      $("#appbtn").click(function(){
          $("h2").addclass("h2change");
      });

 //----------------LE FILTER DE LA TABLE--------------


      $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });


 //--------------------- EXO TRAITEMENT ----------------

          $('#add_exo').click(function(){  
               $('#insert_exo').val("Insert");  
               $('#insert_form_exo')[0].reset();  
          });  
          $(document).on('click', '.edit_data_exo', function(){  
               var exo_id = $(this).attr("id");  
               $.ajax({  
                    url:"fetch.php",  
                    method:"POST",  
                    data:{exo_id:exo_id},  
                    dataType:"json",  
                    success:function(data){  
                         $('#titre').val(data.titre);  
                         $('#language').val(data.language);  
                         $('#enonce').val(data.enonce);  
                         $('#remarque').val(data.remarque);  
                         $('#source').val(data.source); 
                         $('#link').val(data.link); 
                         $('#lanote').val(data.lanote); 
                         $('#exo_id').val(data.id);  
                         $('#insert_exo').val("Update");  
                         $('#add_data_Modal_Exo').modal('show');  
                    }  
               });  
          });  

          $('#insert_form_exo').on("submit", function(event){  
               event.preventDefault();  
               if($('#titre').val() == "")  
               {  
                    alert("titre is required");  
               }  
               else if($('#language').val() == '')  
               {  
                    alert("language is required");  
               }  
               else if($('#enonce').val() == '')  
               {  
                    alert("enonce is required");  
               }  
               else if($('#remarque').val() == '')  
               {  
                    alert("remarque is required");  
               } 
               else if($('#source').val() == '')  
               {  
                    alert("source is required");  
               } 
               else if($('#link').val() == '')  
               {  
                    alert("Link is required");  
               } 
               else if($('#lanote').val() == '')  
               {  
                    alert("La note is required");  
               }
               else  
               {  
                    $.ajax({  
                         url:"insert_exo.php",  
                         method:"POST",  
                         data:$('#insert_form_exo').serialize(),  
                         beforeSend:function(){  
                              $('#insert_exo').val("Inserting");  
                         },  
                         success:function(data){  
                              $('#insert_form_exo')[0].reset();  
                              $('#add_data_Modal_Exo').modal('hide');  
                              $('#exo_table').html(data);  
                         }  
                    });  
               }  
          });  
          $(document).on('click', '.view_data_exo', function(){  
               var exo_id = $(this).attr("id");  
               if(exo_id != '')  
               {  
                    $.ajax({  
                         url:"select.php",  
                         method:"POST",  
                         data:{exo_id:exo_id},  
                         success:function(data){  
                              $('#exo_detail').html(data);  
                              $('#dataModalExo').modal('show');  
                         }  
                    });  
               }            
          }); 





  }); 
  




 
 