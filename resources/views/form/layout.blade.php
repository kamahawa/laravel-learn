{!! Form::open(array('route' => 'sendEmail', 'method' => 'post', 'files' => true)) !!}

{!! Form::label('hoten','Họ Tên') !!}
{!! Form::text('txtHoten', '', array('class' => 'input', 'placeholder' => 'Vui long nhap ho ten')) !!}<br/><br/>

{!! Form::label('password','Password') !!}
{!! Form::password('txtPassword', '', array('class' => 'input')) !!}<br/><br/>

{!! Form::label('email','Email') !!}
{!! Form::password('txtEmail', '', array('class' => 'input')) !!}<br/><br/>

{!! Form::label('ghichu','Ghi Chu') !!}
{!! Form::textarea('txtGhichu', '', array('class' => 'input')) !!}<br/><br/>

{!! Form::label('gioitinh','Gioi tinh') !!}
{!! Form::radio('rdoGioiTinh','nam',true) !!} Nam
{!! Form::radio('rdoGioiTinh','nu') !!} Nu<br/><br/>

{!! Form::label('thanhpho','Thanh pho') !!}
{!! Form::select('sltThanhPho',array('tp' => 'TP HCM','h' => 'Hue','hn' => 'Ha Noi'),'h') !!}<br/><br/>

{!! Form::label('quocgia','Quoc Gia') !!}
{!! Form::select('sltThanhPho',array('1' => 'VietNam','2' => 'Singapore','3' => 'ThaiLan')) !!}<br/><br/>

{!! Form::label('monhoc','mon hoc') !!}
{!! Form::checkbox('chkmonhoc','php',true) !!}PHP
{!! Form::checkbox('chkmonhoc','swift') !!}SWIFT

{!! Form::submit('Gửi') !!}
{!! Form::reset('Xóa') !!}
{!! Form::button('Ok') !!}

{!! Form::close() !!}