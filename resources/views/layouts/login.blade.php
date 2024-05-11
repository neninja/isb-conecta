<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        <div class="bg-primary pb-16"></div>
        <div class="-mt-[2rem] rounded-[8rem] bg-primary-light py-8"></div>
        <div class="px-11 flex-grow flex justify-center"">
            <div class="w-[50rem] flex flex-col">
                <header class="text-3xl font-semibold tracking-tight text-primary mb-5">{{$header}}</header>
                <main>{{$slot}}</main>
                <footer class="mx-auto flex-auto flex flex-col justify-end mt-32 mb-16 w-full max-w-container px-4 sm:px-6 lg:px-8">
                    <ul class="flex justify-around">
                        <li>
                            <a href="#" class="text-neutral-low-medium hover:underline">Sobre</a>
                        </li>
                        <li>
                            <a href="#" class="text-neutral-low-medium hover:underline">Privacidade</a>
                        </li>
                        <li>
                            <a href="#" class="text-neutral-low-medium hover:underline">Termos</a>
                        </li>
                    </ul>
                </footer>
            </div>
        </div>
    </div>
</x-guest-layout>
