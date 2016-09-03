<form action="{{ route('vessel.new') }}" method="post">
    <input type="text" name="imo" placeholder="imo">
    <input type="text" name="name" placeholder="vessel Name">
    <input type="hidden" name="_token" value="{{ Session::token() }}" />
    <input type="submit">
</form>