
 @if(session('success'))
             <div class="alert alert-success">
                 {{ session('success') }}
             </div>
         @elseif (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
             </div>
         @endif

         @if ($errors->any())
             <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
             </div>
         @endif