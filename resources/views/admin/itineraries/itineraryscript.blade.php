<input type="hidden" name="_token" id="csrftoken" value="{{ csrf_token() }}">
<script>
    $(document).ready(function(){
        function loadeditpage()
        {
            itineraries_id = $(".itineraries_id").val();

            showitinerarydays(itineraries_id);
        }
        loadeditpage();
        function showitinerarydays(itineraries_id)
        {
            var csrftoken = $('#csrftoken').val();
            $.ajax({
                url:'{{ url("/admin/itineraries/showitinerarydays")}}',
                method:'post',
                data:{_token:csrftoken,itineraries_id:itineraries_id},
                success:function(data)
                {
                    $(".showitinerarydayshtml").html(data);
                }
            });
        }
        $(document).on('click','a[data-role=additineraryday]',function(){
            var csrftoken = $('#csrftoken').val();
            var itineraries_id = $('.itineraries_id').val();
            $.ajax({
                url:'{{ url("/admin/itineraries/additineraryday")}}',
                method:'post',
                data:{_token:csrftoken,itineraries_id:itineraries_id},
                success:function(data)
                {
                    showitinerarydays(itineraries_id);
                }
            });
        });
    });
</script>