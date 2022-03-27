@extends('adminlte::page')

@section('title','Data Peminjaman')

@section('content_header')

<br>
@endsection
@section('content')
<div class="panel panel-default col-md-12">
    <div class="panel-heading">Form Input Edit User
        <a href="{{ route('user-management.index') }}" class="btn btn-default" style="float: right;"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <form role="form" action="{{ route('user-management.update',$user->id) }}" method="post">
            @csrf
                @method('put')
                <div class="form-group">
                    <label>Nama</label>
                    <input value={{$user->name}} type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input value={{$user->email}} type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input value={{$user->password}} type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="">Select Role</label>
                    <select name="role[]" class="form-control">
                        @foreach ($roles as $data)
                            <option value="{{ $data->id }}" @isset($user)
                                @if (in_array($data->id, $user->roles->pluck('id')->toArray())) selected @endif @endisset>
                                {{ $data->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-default" type="reset">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
