<form action="{{ route('events.store')  }}" method="post">

    {{ csrf_field() }}
    <input type="text" name="title" id="">
    <input type="text" name="description" id="">
    <input type="date" name="begin_at" id="">
    <input type="date" name="end_at" id="">
    <input type="text" name="location" id="">

    <input type="submit" value="Valider">
</form>
