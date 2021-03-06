@extends('layouts.app')

@section('content')
    <div class="container">
        <form>
            <div class="form-group">
                <input class="typeahead form-control" type="text" placeholder="Titulo de la Entrada">
            </div>
        </form>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <tbody id="bodyTableData">
                @foreach($data as $d)
                    <tr>
                        <td>{{ $d->ID }}</td>
                        <td>{{ $d->post_title }}</td>
                        <td>{{ $d->post_type }}</td>
                        <td>{{ $d->post_mime_type }}</td>
                        <td>
                            <a href="#" class="paso" data-id="{{ $d->ID }}">Pasar Produccion</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.paso').unbind().bind('click',function(){
                alert('paso');
                $id =$(this).attr('data-id');
                alert($id);
                $.ajax({
                    url: '{{ route('create_post_pro') }}',
                    data: {
                        id : $id
                    },
                    type: 'GET',
                    success: function(data){

                    },error:function(e){
                        alert('Ocurrio un error 2 ');
                    }
                });
            });

            var pathProject = "{{ route('autocomplete_post_pre') }}";
            $("input.typeahead").typeahead({
                source:  function (query, process) {
                    return $.get(pathProject, { query: query }, function (data) {
                        $('#bodyTableData').html(data);
                    });
                },updater:function (selection) {
                    $('#project_id').val(selection.id);
                    return selection.name;
                }
            });
        });

    </script>
@endsection