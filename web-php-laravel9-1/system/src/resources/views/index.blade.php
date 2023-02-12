<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>


        <!-- Bootstrap -->
        <link href="{{ asset('/bootstrap-5.0.2-dist/css/bootstrap.css') }}" rel="stylesheet">
        <script src="{{ asset('/bootstrap-5.0.2-dist/js/bootstrap.js') }}"></script>

        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- jQuery  -->
        <script src="{{ asset('/jquery/jquery-3.6.3.js') }}"></script>

    </head>
    <body class="container bg-light">
        
        <div class="contents my-5 d-flex flex-row">
            
            <div class="list-area col-8 m-4 p-4 d-flex flex-column shadow p-3 mb-5 bg-body rounded rounded-3 bg-light" style="height:70vh;">
                
                <div class="row mb-3">
                    リスト
                </div>

                <div class="row mb-3" style="height:60vh;overflow-y:scroll;">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">名称</th>
                                <th scope="col">作成日時</th>
                                <th scope="col">更新日時</th>
                                <th scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topics as $topic)                            
                                <tr class="select-detail-tr" id="row-index-{{ $loop->index }}">
                                    <td>{{ $topic->id }}</td>
                                    <td>{{ $topic->name }}</td>
                                    <td>{{ $topic->created_at }}</td>
                                    <td>{{ $topic->updated_at }}</td>
                                    <td class="px-0 mx-0">
                                        <div class="d-flex">
                                            <div class="me-3">
                                                <span type="button" name="edit-icon" class="material-symbols-outlined">
                                                    edit
                                                </span>
                                            </div>
                                            <div>
                                                <span type="button" name="delete-icon" class="material-symbols-outlined">
                                                    delete
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <input name="id" value="{{ $topic->id }}" type="hidden">
                                    <input name="name" value="{{ $topic->name }}" type="hidden">
                                    <input name="toc" value="{{ $topic->toc }}" type="hidden">
                                    <input name="memo" value="{{ $topic->memo }}" type="hidden">
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <form name="list-form" action="/" method="post">
                        @method('delete')
                        @csrf
                    </form>

                </div>

                <div class="row justify-content-end me-2">
                    <!-- <button type="button" class="btn btn-outline-dark" style="width:10%;">

                    </button> -->
                    <span type="button" class="new-button p-2 shadow material-symbols-outlined " 
                        style="width:5%;background-color:#EEEEEE;border-radius:50%;">
                        add
                    </span>
                </div>
                
            </div>
            
            <div class="detail-area col-4 m-4 p-4 d-flex flex-column shadow p-3 mb-5 bg-body rounded rounded-3 bg-light">
                <form name="detail-form" action="/" method="post">
                    @csrf

                    <div class="row mb-3">
                        詳細
                        <input name="id-selected" value="" type="hidden">
                    </div>
                    
                    <div class="row mb-4">

                        <div class="mb-3">
                            <label for="name-selected" class="form-label">名称</label>
                            <input name="name-selected" id="name-selected" value="" class="form-control" type="text">
                        </div>

                        <div class="mb-3">
                            <label for="toc-selected" class="form-label">内容</label>
                            <textarea name="toc-selected" id="toc-selected" class="form-control" rows="10"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="memo-selected" class="form-label">メモ</label>
                            <textarea name="memo-selected" id="memo-selected" class="form-control" ></textarea>
                        </div>

                    </div>

                    <div class="row justify-content-end me-2">
                        <button type="button" class="create-button btn btn-outline-primary" style="display:none;width:20%;">登録</button>
                        <button type="button" class="update-button btn btn-outline-primary" style="display:none;width:20%;">更新</button>
                    </div>

                </form>
            </div>
        
        </div>

    </body>

    <script>
        $(function() {

            // 
            $('.new-button').on('click',function(e){

                $("input[name='name-selected']").val('');
                $("textarea[name='toc-selected']").val('');
                $("textarea[name='memo-selected']").val('');

                $('.update-button').hide();
                $('.create-button').show();

            });

            // 更新
            $('.update-button').on('click',function(e){

                const targetId = $("input[name='id-selected']").val();

                if(targetId){
                    //alert("{{ url('/topics/') }}/" + targetId)
                    const url = "{{ url('/topics/') }}/" + targetId;
                    //const url = "{{ url('/index.php/topics/') }}/" + targetId + 
                    $("form[name='detail-form']").attr('action',url);
                    $("form[name='detail-form']").attr('method','post');
                    $("form[name='detail-form']").submit();

                }

            });

            // 登録
            $('.create-button').on('click',function(e){
                
                const url = "{{ url('/topics/') }}";
                $("form[name='detail-form']").attr('action',url);
                $("form[name='detail-form']").attr('method','post');
                $("form[name='detail-form']").submit();

            });

            // テーブル行選択
            $('.select-detail-tr').on('click',function(e){
                
                console.log($(this))
                console.log($(e.target).attr('name'))

                $(this).find("input[name='id']").val()
                const targetId = $(this).find("input[name='id']").val();
                console.log(targetId)

                if( $(e.target).attr('name') === 'delete-icon') {

                    
                    
                    if(targetId){


                        const url = "{{ url('/topics/') }}/" + targetId;
                        $("form[name='list-form']").attr('action',url);
                        $("form[name='list-form']").attr('method', 'post');
                        $("form[name='list-form']").submit();

                        alert('削除していいですか ' + url)

                    
                    }

                }

                if( $(e.target).attr('name') === 'edit-icon') {
                    // alert('編集')
                    //const id = $(this).find("input[name='id']").val();
                    $("input[name='id-selected']").val(targetId);

                    const name = $(this).find("input[name='name']").val();
                    $("input[name='name-selected']").val(name);

                    const toc = $(this).find("input[name='toc']").val();
                    console.log(toc)
                    $("textarea[name='toc-selected']").val(toc);

                    const memo = $(this).find("input[name='memo']").val();
                    $("textarea[name='memo-selected']").val(memo);

                    $('.create-button').hide();
                    $('.update-button').show();
                }
            
            });


        });
    </script>

</html>


