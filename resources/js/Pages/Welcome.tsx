import { Head } from "@inertiajs/react";

import { Button } from "@/Components/Button";
import { Footer } from "@/Components/Footer";
import { route } from "@/Helpers/routes";

export default function Welcome() {
    return (
        <>
            <Head title="Bem vindo" />
            <div className="min-h-screen flex flex-col">
                <div
                    className="bg-primary flex items-center justify-center relative min-h-[30vh]
                    after:content-[''] after:rounded-t-full after:bg-neutral-high after:w-[100%] after:h-8 after:absolute after:bottom-0 after:left-0"
                ></div>
                <div className="bg-neutral-high flex-auto flex justify-center">
                    <div className="max-w-[800px] mx-7">
                        <h1 className="text-xl text-primary">
                            Bem-vindo ao ISB CONECTA
                        </h1>
                        <p className="text-neutral-low my-5">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Morbi augue neque, tincidunt non aliquet ac,
                            fringilla quis velit. Aenean aliquet a mauris at
                            malesuada. Pellentesque justo purus, pharetra vitae
                            vestibulum eget, dignissim non eros.
                        </p>

                        <div className="mb-5">
                            <Button href={route("login")} fullWidth>
                                Prosseguir para login
                            </Button>
                        </div>

                        <Footer />
                    </div>
                </div>
            </div>
        </>
    );
}
