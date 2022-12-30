
<div>



{{-- check if there is any errors send --}}
    @if($errors->any())
    {{-- initialize message variable --}}
    @php($message = '')
    {{-- loop trhough error messages --}}
    @foreach($errors->all() as $error)
    {{-- append every error to $message variable --}}
    @php($message .= "$error <br />")
    @endforeach
    {{-- show sweetalert --}}
    <livewire:subcomponents.alert.error :message="$message" />
    @endif

    {{-- response error --}}
    @if(session()->has('error'))
    <livewire:subcomponents.alert.error :message="session()->get('error')" />
    @endif

    {{-- response success --}}
    @if(session()->has('success'))
        <div x-init="Swal.fire({
        icon: 'success',
        title: 'Success',
        html: '{{ session()->get('success') }}'
        })"></div>
    @endif

@if($transaction->status != 0 && $transaction->status != 4)


<div class="bg-white p-6  md:mx-auto">
        <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
            <path fill="currentColor"
                d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
            </path>
        </svg>
        <div class="text-center">
            <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Payment Done!</h3>
            <p class="text-gray-600 my-2">Thank you. Please wait until verification done.</p>
            <p> Have a great day! </p>
            <div class="py-10 text-center">
                <a href="" class="px-12 bg-darkerPrimary hover:bg-darkerPrimary text-white font-semibold py-3">
                    GO BACK
                </a>
            </div>
        </div>
    </div>

@else

<div class="w-full mx-auto rounded-lg bg-white shadow-lg p-5 text-gray-700" style="max-width: 600px">
    <div class="w-full pt-1 pb-5">
        <div
            class="bg-darkerPrimary text-white overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg flex justify-center items-center">
            <i class="fa-solid fa-credit-card text-3xl"></i>
        </div>
    </div>
    <div class="mb-10">
        <h1 class="text-center font-bold text-xl uppercase">payment details</h1>
        <span class="text-center text-gray-500 inline-block w-full">*Please upload your transfer receipt</span>
    </div>

    <div class="mb-2">
        <h1 class="text-slate-700 text-semibold text-xl">How to pay your bill</h1>
        <ul>
            <li>1. Transfer to this bank account BCA: 1234567890 A/N: Fulan Kurniawan</li>
            <li>2. Upload your transfer receipt</li>
            <li>3. Type your password</li>
            <li>4. Wait for verification</li>
            <li>5. And done! you can get your license key!</li>
        </ul>
    </div>

    <form action="" wire:submit.prevent="checkout">
            
                <div class="mb-3">
                    <label class="font-bold text-sm mb-2 ml-1">Transfer Receipt</label>
                    <input
                        class="block w-full text-sm file:bg-primary file:outline-none file:border-none file:text-white file:py-3 file:px-2 file:hover:cursor-pointer text-primary-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file" name="picture" wire:model="receipt_image">
                </div>
            
                <div class="mb-3">
                    <label class="font-bold text-sm mb-2 ml-1">Password</label>
                    <div>
                        <input type="password"
                            class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors"
                            placeholder="Please type your password to continue" type="text" wire:model="password" />
                    </div>
                </div>
                <div class="mb-2">
                    <h1>Need help?</h1>
                    <p>Please message <a href="wa.me/+6287787787"
                            class="text-primary py-1 px-1 focus:bg-primary/30 rounded">+6287787787</a> on Whatsapp</p>
                </div>
            
            
                <div class="border-t pt-3">
                    <h1 class="text-lg text-center mt-4 text-gray-600 font-semibold mb-5">Payment amount: Rp{{ number_format($transaction->total) }}</h1>
                    <button
                        class="block w-full max-w-xs mx-auto bg-darkerPrimary hover:bg-darkerPrimary/80 focus:bg-darkerPrimary/80 text-white rounded-lg px-3 py-3 font-semibold"><i
                            class="mdi mdi-lock-outline mr-1"></i> PAY NOW</button>
                </div>
            </form>
</div>
            @endif
</div>

