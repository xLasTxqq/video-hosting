<div style="display: flex;" id="mainpage">
	<style type="text/css">
		video{
			min-height: 9vw;
			min-width: 16vw;
			max-height: 18vw;
			max-width: 38vw;		
		}
		h1{
			cursor: default;
		}
	</style>
<div class="vid1">
	@if(count(DB::table('videos')->where('warning','0')->get())>0)
		@for($i=0;$i < 10 and $i < count(DB::table('videos')->where('warning','0')->latest()->get());$i++)
		<div class="vid">
		<a href="{{route('watch',DB::table('videos')->where('warning','0')->latest()->get()[$i]->id)}}">
		<video>
			<!-- controls="controls" -->
			<source src="{{ asset('//hosting/storage/app/public/'.DB::table('videos')->where('warning','0')->latest()->get()[$i]->filename)}}" type="video/mp4">
		</video>
		</a>
			<h1>{{DB::table('videos')->where('warning','0')->latest()->get()[$i]->name}}</h1>
			<h1>{{DB::table('videos')->where('warning','0')->latest()->get()[$i]->created_at}}</h1>
		</div>
		@endfor
	@else
	<h1>Нет загруженных видео без ограничений</h1>
	@endif
</div>
</div>