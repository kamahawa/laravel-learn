<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>My site</title>
</head>
<body>
<!--
@if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $error)
            <li>
                {!! $error !!}
            </li>
        @endforeach
    </ul>
@endif
-->
<form action="{!! route('postDangKy') !!}" method="post" name="frmThem" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <table>
        <tr>
            <td>Mon hoc</td>
            <td>
                <input type="text" name="txtMonHoc"/>
                {!! $errors->first('txtMonHoc') !!}
            </td>
        </tr>
        <tr>
            <td>Gia</td>
            <td>
                <input type="text" name="txtGia"/>
                {!! $errors->first('txtGia') !!}
            </td>
        </tr>
        <tr>
            <td>Giang vien</td>
            <td>
                <input type="text" name="txtGiangvien"/>
                {!! $errors->first('txtGiangvien') !!}
            </td>
        </tr>
        <tr>
            <td>Hinh anh</td>
            <td>
                <input type="file" name="fImage"/>
                {!! $errors->first('fImage') !!}
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Them"/></td>
        </tr>
    </table>
</form>
</body>
</html>