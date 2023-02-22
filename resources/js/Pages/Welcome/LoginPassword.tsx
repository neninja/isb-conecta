import { Button } from "@/Components/Button";
import { Input } from "@/Components/Input";

interface LoginPasswordProps {
    handleContinue: () => void;
    setPassword: (v: string) => void;
}

export function LoginPassword({
    handleContinue,
    setPassword,
}: LoginPasswordProps) {
    return (
        <>
            <h1 className="text-xl text-primary">Olá</h1>
            <p className="text-neutral-low my-5">
                Você está cadastrado na equipe de design do Instituto São
                Benedito.
            </p>

            <form>
                <Input
                    label="Digite sua senha"
                    type="password"
                    onChange={(v) => setPassword(v.target.value)}
                />

                <div className="mt-5">
                    <Button type="submit" onClick={handleContinue} fullWidth>
                        Entrar
                    </Button>
                </div>
            </form>
        </>
    );
}
