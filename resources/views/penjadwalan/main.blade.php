@extends('layouts.app')
@section('content')
<div id="content_input"></div>
<div id="content_list">
<div class="container">
        <div class="row justify-content-center">
            <form id="content_filter">
                <select class="form-control" onchange="load_list(1);" name="jenis" id="jenis">
                    <option value="semua" selected>Semua</option>
                    <option value="2">Selesai</option>
                    <option value="1">Menunggu</option>
                </select>
            </form>
            <div class="col-md-12 mt-3">
            <button onclick="load_input('{{route('penjadwalan.create')}}');" style="float: right;" class="btn btn-primary mb-3" type="button">
                Tambah Penjadwalan Distribusi
            </button>
            </div>
            <div class="col-md-12">
                <h2 class="text-center m-4">Daftar Penjadwalan Distribusi</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mt-3">
                            <div id="list_result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <button onclick="window.location.href ='{{route('barang_pdf')}}'" style="float: right;" class="btn btn-primary mt-3" type="button"  data-toggle="modal" data-target="#CreateArticleModal">
            Cetak Daftar Barang
        </button> --}}
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
        load_list(1);
    $(document).ready(function(){
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault(); 
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page)
        {
            $.ajax({
            url:"?page="+page,
            success:function(data){
                $('#list_result').html(data);
            }
            });
        }
    });
</script>
@endsection