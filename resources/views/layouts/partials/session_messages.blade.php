@session('success')
    <div class="max-w-screen pt-10" id="session_message">
        <div class="flex items-center bg-green-500/75 text-white text-sm font-bold px-5 py-4">
            <x-zondicon-checkmark class="size-5" />
            <p class="pl-3">{{ $value }}</p>
        </div>
    </div>
@endsession
@session('error')
    <div class="max-w-screen pt-10" id="session_message">
        <div class="flex items-center bg-red-500/75 text-white text-sm font-bold px-5 py-4">
            <x-iconpark-error class="size-5" />
            <p class="pl-3">{{ $value }}</p>
        </div>
    </div>
@endsession


<script>
    const hideSessionMessage = () => {
        const sessionMessage = document.getElementById('session_message')
        if (sessionMessage != null)
            setTimeout(() => sessionMessage.remove(), 1000 * 5)
    }
    hideSessionMessage()
</script>
