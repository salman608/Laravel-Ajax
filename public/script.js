$(function(){
  $("#addcustomerform").on("submit", function(e){
    e.preventDefault();
    var form=$(this);
    var url =form.attr("action");
    var type=form.attr("method");
    var data=form.serialize();

    $.ajax({
      url:url,
      data:data,
      type:type,
      dataType:"JSON",

      beforeSend:function(){
          $(".load").fadeIn();
      },
      success:function(data){
      if(data=="success"){
        $("#exampleModal").modal("hide");
        swal("Great","Insert customer data Successfully!!","success");
        return getCustomerData();
      }

      },
      complete:function(){
        $(".load").fadeOut();

      },
    });

  });

  function getCustomerData() {
    var url=$('#getalldata').data('url');


    $.ajax({
      url:url,
      type:"get",
      dataType:"HTML",
      success:function(response){
         $("#showAllData").html('response');
      }
    });
  }

// view Data
  $(document).on("click","#view", function(e){
    e.preventDefault();
    var id=$(this).data("id");
    var url=$(this).attr("href");


    $.ajax({
      url:url,
      data:{id:id},
      type:"GET",
      dataType:"JSON",

      success:function(response){

        if($.isEmptyObject(response) != null){
          $("#ViewCustomer").modal("show");
          $("#customerview").text(response.name + "'s Data");
          $(".cname").text("Name :" + response.name);
          $(".cphone").text("Phone :" + response.phone );
          $(".cemail").text("Email :" + response.email );
          $(".cdistrict").text("District :" + response.district );
        }

      }
    });
  });

  // Delete dataType
  $(document).on("click","#delete", function(arg){
     arg.preventDefault();
     var id=$(this).data("id");
     var url=$(this).attr("href");

     $.ajax({
       url:url,
       data:{id:id},
       type:"GET",
       dataType:"JSON",
       success (response){
         swal("delete","Customer delete Successfully",'success');
          return getCustomerData();
       }
     });
  });


  // edit custonmer data
  $(document).on("click","#edit", function(arg){
    arg.preventDefault();
    var id=$(this).data("id");
    var url=$(this).attr("href");


    $.ajax({
      url:url,
      data:{id:id},
      type:"GET",
      dataType:"JSON",
      success (response){
         $("#updateCustomer").modal("show");
         $("#updateCustomerTitle").text(response.name + "'s Data Update");

         $("#cname").val( response.name);
         $("#cphone").val( response.phone );
         $("#cemail").val( response.email );
         $("#cdistrict").val( response.district );
         $("#customerid").val( response.id );
      }
    });
  });

  // Update customer Data

  $("#updatecustomerform").on("submit", function(arg){
    arg.preventDefault();
    var form=$(this);
    var url =form.attr("action");
    var type=form.attr("method");
    var data=form.serialize();

    $.ajax({
      url:url,
      data:data,
      type:type,
      dataType:"JSON",

      beforeSend:function(){
          $(".load").fadeIn();
      },
      success:function(data){
      if(respons=="success"){

        swal("Great","Update customer data Successfully!!","success");
        $("#updateCustomer").modal("hide");
        return getCustomerData();
      }

      },
      complete:function(){
        $(".load").fadeOut();

      },
    });

  });


});
