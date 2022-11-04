 <!-- Flickity JavaScript -->
 <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

 <script>
     function addSlide(type){

         var input = document.createElement("input");
         input.setAttribute("type", "hidden");
         input.setAttribute("name", "type");
         input.setAttribute("value", type);

         //append to form element that you want .
         document.getElementById("sliderForm").appendChild(input);

         const pond = FilePond.create(document.querySelector('.filepond'), { name: 'photo'});
         if (pond != null) {
             pond.removeFiles();
         }


         $("#sliderForm")[0].reset();
         $("#slider").modal('show');
     }

     function changeSlider(id){
         $.ajax({
             type: 'GET',
             url: `{{url('/admin/banner/${id}')}}`,
             dataType: 'json',
             success: function(response) {
                 if(response.status == true){
                     var data = response.data
                     const pond = FilePond.create(document.querySelector('.filepond'), { name: 'photo'});
                     if (data.photo != '') {
                         pond.addFiles(root+data.photo);
                     }

                     //append banner id .
                     var input = document.createElement("input");
                     input.setAttribute("type", "hidden");
                     input.setAttribute("name", "id");
                     input.setAttribute("value", data.id);
                     document.getElementById("sliderForm").appendChild(input);

                     //append banner type .
                     var input = document.createElement("input");
                     input.setAttribute("type", "hidden");
                     input.setAttribute("name", "type");
                     input.setAttribute("value", data.type);
                     document.getElementById("sliderForm").appendChild(input);

                     if(data.type == 'cat_banners'){
                        $("#h1").val(data.h1);
                        $("#h1_color").val(data.h1_color);
                        $("#link").val(data.link);
                        $("#btn_text").val(data.btn_text);
                        $("#btn_bg_color").val(data.btn_bg_color);
                        $(".showable").addClass('d-none')
                    }else{
                        $("#h1").val(data.h1);
                        $("#h1_color").val(data.h1_color);
                        $("#h2").val(data.h2);
                        $("#h2_color").val(data.h2_color);
                        $("#h3").val(data.h3);
                        $("#h3_color").val(data.h3_color);
                        $("#link").val(data.link);
                        $("#btn_text").val(data.btn_text);
                        $("#btn_text_color").val(data.btn_text_color);
                        $("#btn_bg_color").val(data.btn_bg_color);
                        $("#description").html(data.description);
                        $("#description_color").val(data.description_color);
                        $("#status").val(data.status);
                        $("#status").trigger('change');
                        $(".showable").removeClass('d-none')
                    }


                     $("#slider").modal('show');
                 }
             }
         });
     }

     $("#sliderForm").submit(function(e) {
         e.preventDefault();

         $.ajax({
             url: $(this).attr('action'),
             type: "POST",
             data: new FormData(this),
             contentType: false,
             cache: false,
             processData: false,
             success: function(response) {
                 if (response.status == true) {
                     $("#slider").modal('hide');
                     alertNotification('success', '', response.message)
                     window.location.reload();
                 }

             },
             error: function(e) {
                 console.log(e);
             }
         });
     });
 </script>
