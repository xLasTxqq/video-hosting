<div style="display: none;" id="myvideospage">
<style type="text/css">
	body{
		display: flex;
		flex-direction: column;
		text-align: center;
		width: 100%;
		height: 100%;
		align-items: center;
		justify-content: space-evenly;
		flex-wrap: wrap;
	}
	.vid{
		min-height: 20vw;
		min-width: 20vw;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		align-items: center;
		border: 0.1vw solid white;
		padding: 1vw;
	}
	.vid1{
		display: flex;
		align-items: center;
		justify-content: space-evenly;
		flex-wrap: wrap;
	}
</style>
<div class="vid1">
	@if(isset(\Auth::user()->id))
	@if(count(DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->get())>0)
		@for($i=0; $i < count(DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->get());$i++)
		<div class="vid">
		<a href="{{route('watch',DB::table('videos')->whereRaw('warning!=3')->orderByRaw('-likes - dislikes')->where('iduser', \Auth::user()->id)->get()[$i]->id)}}">
		<video>
			<!-- controls="controls" -->
			<source src="{{asset('//hosting/storage/app/public/'.DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->orderByRaw('-likes - dislikes')->get()[$i]->filename)}}" type="video/mp4">
		</video>
		</a>
		<h1>Название: {{DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->orderByRaw('-likes - dislikes')->get()[$i]->name}}</h1>
		<h1 style="white-space: pre-wrap; word-wrap: break-word; max-width: 50vw;">Описание: {{DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->orderByRaw('-likes - dislikes')->get()[$i]->description}}</h1>
		<h1>Кол-во лайков: {{DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->orderByRaw('-likes - dislikes')->get()[$i]->likes}}</h1>
		<h1>Кол-во дизлайков: {{DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->orderByRaw('-likes - dislikes')->get()[$i]->dislikes}}</h1>
		<h1>Дата загрузки видео: {{DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->orderByRaw('-likes - dislikes')->get()[$i]->created_at}}</h1>
		<h1>Категория: {{DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->orderByRaw('-likes - dislikes')->get()[$i]->categories}}</h1>
		@if(DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->orderByRaw('-likes - dislikes')->get()[$i]->warning==0)
		<h1>Ограничений нет</h1><br>
		@endif
		@if(DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->orderByRaw('-likes - dislikes')->get()[$i]->warning==1)
		<h1>Присутствует нарушение</h1><br>
		@endif
		@if(DB::table('videos')->whereRaw('warning!=3')->where('iduser', \Auth::user()->id)->orderByRaw('-likes - dislikes')->get()[$i]->warning==2)
		<h1>Присутствует теневой бан</h1><br>
		@endif
		</div>
		@endfor
	@else
	<h1>Нет загруженных видео</h1>
	@endif
	@endif
</div>
</div>