<div style="display: none;" id="newvideopage">
<style type="text/css">
	input{
		height: 2vw;
		min-width: 10vw;
		border-radius: 10px;
		text-align: center;
		font-size: 1vw;
	}
	textarea{
		border-radius: 10px;
		font-size: 1.5vw;
		text-align: center;
	}
	select{
		height: 2vw;
		min-width: 10vw;
		border-radius: 10px;
		font-size: 1vw;
		cursor: pointer;
	}
	option{
		height: 2vw;
		min-width: 10vw;
		cursor: pointer;
	}
	input[type='file']{
		height: 3vw;
		min-width: 15vw;
		cursor: pointer;
	}
	button{
		margin-top: 1vw;
		height: 2.5vw;
		min-width: 15vw;
		border-radius: 10px;
		font-size: 1vw;
		font-weight: bold;
	}
	.invalid{
		color: red;
		margin-top: 1vw;
		font-size: 1.5vw;
	}
</style>
	<form method="post" action="Video" enctype="multipart/form-data">
		{{csrf_field()}}
		@if($errors->any())
		  <div class="invalid">
		    @foreach ($errors->all() as $error)
		      <div>{{ $error }}</div>
		    @endforeach
		  </div>
		@endif
		<h1>Введите название видеоролика:</h1>
		<input type="text" required autocomplete autofocus placeholder="Название" name="naming">
		<h1>Введите описание видеоролика</h1>
		<textarea cols="40" rows="6" maxlength="254" placeholder="Описание" name="opisanie"></textarea>
		<!-- <input id="inputopisanie" type="text" placeholder="Описание" autocomplete maxlength="254"> -->
		<h1>Выберите категорию видеоролика</h1>
		<select required name="category">
			<option value="Игры">Игры</option>
			<option value="Спорт">Спорт</option>
			<option value="Новости">Новости</option>
		</select>
		<h1>Добавьте файл видеоролика в формате MP4</h1>
		<input type="file" accept=".mp4" name="videofile">
		<br><button type="submit">Отправить видео</button>
	</form>
</div>