@extends("layouts.master")

@section("title")Личный кабинет@endsection

@section('asside')
    @include('inc.asside',['user' => $user])
@endsection

@section("content")

    <h1>Личный кабинет</h1>
    <form action="{{route('user.update',[$user->info->slug])}}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <label for="FIO">ФИО:</label>
                <input type="text" name="FIO" value="{{old('FIO', $user->FIO)}}" placeholder="Введите своё ФИО">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="birthday_date">День рождения:</label>
                <input type="date" name="birthday_date" value="{{old('birthday_date', $user->birthday_date)}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="slug">Ник в адресной строке:</label>
                <input type="text" name="slug" value="{{old('slug', $user->info->slug)}}"
                       placeholder="Введите свой ник">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="gender">Пол:</label>
                <select name="gender">
                    @if($user->info->gender == 'Choose a gender')
                        <option value="null" selected>Выберите пол</option>
                    @endif
                    @if($user->info->gender == 'man')
                        <option value="man" selected>Мужчина</option>
                    @else
                        <option value="man">Мужчина</option>
                    @endif
                    @if($user->info->gender == 'woman')
                        <option value="woman" selected>Девушка</option>
                    @else
                        <option value="woman">Девушка</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="height">Рост:</label>
                <input type="text" name="height" value="{{old('height', $user->info->height)}}"
                       placeholder="Введите свой рост">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="parameters">Параметры(через "-"):</label>
                <input type="text" name="parameters" value="{{old('parameters', $user->info->parameters)}}"
                       placeholder="Введите свои параметры">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="instagram_link">Ссылка на instagram</label>
                <input type="text" name="instagram_link" value="{{old('instagram_link', $user->info->instagram_link)}}"
                       placeholder="Вставьте ссылку на ваш instagram">
            </div>
        </div>
        <div class="form-group row mb-2">
            <div class="col-md-6">
                <label for="about_you">О себе</label>
                <textarea class="form-control" rows="4"
                          name="about_you">{{old('about_you', $user->info->about_you)}}</textarea>
            </div>
        </div>
        <button class="btn btn-success" type="submit">Применить изменения</button>
    </form>
@endsection
