<div class="p-5 container m-5 rounded border bg-light">

    @if (session()->has('createUserMessage'))
    <div class="alert alert-success" role="alert">
        {{ session('createUserMessage') }}
    </div>
    @endif

    <div class="mb-4">
        <h1 class="text-2xl mb-4">Crear un usuario nuevo</h1>
    </div>

        <form method="post" action="#" wire:submit.prevent="createUser()">
            <div class="my-2">
                <label for="description">Name</label>
                <input type="text" maxlength="150" placeholder="Name" class="form-control"
                    wire:model.defer="name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="my-2">
                <label for="description">Email</label>
                <input type="email" maxlength="150" placeholder="Email" class="form-control"
                    wire:model.defer="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="my-2">
                <label for="description">Password</label>
                <input type="text" placeholder="Password" class="form-control" wire:model.defer="password"
                    id="userPassword">
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="button" class="btn btn-primary btn-block" onClick="setRandomPassword()"
                wire:loading.attr="disabled">
                Generate random password
                <i class="fas fa-exchange-alt" wire:loading.remove></i>
                <i class="fas fa-spinner fa-spin" wire:loading></i>
            </button>

            <button class="btn btn-secondary btn-block" wire:click="createUser()" wire:loading.attr="disabled">
                Create user
                <i class="fas fa-hand-point-right" wire:loading.remove></i>
                <i class="fas fa-spinner fa-spin" wire:loading></i>
            </button>

            <script>
                function generatePassword() {
                    var length = 8,
                        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                        retVal = "";
                    for (var i = 0, n = charset.length; i < length; ++i) {
                        retVal += charset.charAt(Math.floor(Math.random() * n));
                    }
                    return retVal;
                }

                function setRandomPassword() {
                    document.getElementById("userPassword").value = generatePassword();
                    document.getElementById("userPassword").dispatchEvent(new Event('input'));
                }

                $(document).ready(function (){
                    setRandomPassword();
                });
            </script>

        </form>

    


</div>
