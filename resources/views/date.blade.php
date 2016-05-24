<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
 <script   src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<div class="a"><input type="text" name="daterange" class="abc" /></div>

<div id="ack">@foreach($db as $d){{$d->name}}@endforeach</div>

<script type="text/javascript">
$(function() {
    $('input[name="daterange"]').daterangepicker({
    	  locale: {
      format: 'YY-MM-DD'
    }
    });
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	$(".applyBtn").on("click",function(e){
	e.preventDefault();
	$i = $('input[name="daterangepicker_start"]').val();
	$e = $('input[name="daterangepicker_end"]').val();

	var data = "daterangepicker_start="+$i+"&daterangepicker_end="+$e;
	$.ajax({
		type:"GET",
		data:data,
		url:'{{ URL::to("/date1") }}',
		success:function(data)
      {
 		$("#ack").html(data);
      }
	})
	});
	});
</script>
