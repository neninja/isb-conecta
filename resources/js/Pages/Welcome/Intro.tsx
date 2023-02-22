import { Button } from "@/Components/Button";

interface IntroProps {
    handleContinue: () => void;
}

export function Intro({ handleContinue }: IntroProps) {
    return (
        <>
            <h1 className="text-xl text-primary">Bem-vindo ao ISB CONECTA</h1>
            <p className="text-neutral-low my-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing aliquet ac,
                fringilla quis velit. Aenean aliquet a mauris at malesuada.
                Pellentesque justo purus, pharetra vitae pharetra pharetra vitae
                vestibulum eget, dignissim non eros.
            </p>

            <div className="mt-5">
                <Button onClick={handleContinue} fullWidth>
                    Prosseguir para login
                </Button>
            </div>
        </>
    );
}
