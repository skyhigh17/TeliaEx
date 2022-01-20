<html>
    <form>
        Muuda keelt: <a href="{{ route('change_language', ['language' => 'EST'])}}" >EST</a> 
        <a href="{{ route('change_language', ['language' => 'ENG'])}}">ENG</a> <a href="{{ route('change_language', ['language' => 'RUS'])}}">RUS</a>
    </form>
</html>