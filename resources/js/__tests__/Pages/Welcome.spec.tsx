import { render, within } from "@testing-library/react";

import Welcome from "@/Pages/Welcome";

vi.mock("@inertiajs/react", () => ({
    Head: vi.fn(),
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    Link: (props: any) => <a {...props} />,
}));

vi.mock("@/Helpers/routes", () => ({
    route: () => "qualquer-link",
}));

it("shows title", () => {
    const { getByText } = render(<Welcome />);

    expect(getByText(/Bem-vindo ao ISB CONECTA/i)).toBeDefined();
});

it("has login's button", () => {
    const { getByRole } = render(<Welcome />);

    expect(
        getByRole("button", {
            name: /Prosseguir para login/i,
        }),
    ).toBeDefined();
});

it("has footer's links", () => {
    const { getByRole } = render(<Welcome />);

    const list = getByRole("list", { name: /suporte/i });

    expect(list).toBeDefined();

    expect(
        within(list).getByRole("link", {
            name: /Ajuda/i,
        }),
    ).toBeDefined();

    expect(
        within(list).getByRole("link", {
            name: /Privacidade/i,
        }),
    ).toBeDefined();

    expect(
        within(list).getByRole("link", {
            name: /Termos/i,
        }),
    ).toBeDefined();
});
