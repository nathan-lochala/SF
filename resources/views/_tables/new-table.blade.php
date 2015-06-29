{{--
REQUIRED
$table_head = array of header names

--}}

<table class="table table-hover" id="{{ $id or '' }}">
    <thead>
    <tr>
        @foreach($table_head as $name)
            <th>{{ $name }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
