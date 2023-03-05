import { render, screen, within } from "@testing-library/react";

import Dashboard from "@/Pages/Dashboard";

// vi.mock("@/Layouts/AuthenticatedLayout", () => (props) => {
//     return <span data-testid="modal" {...props}></span>;
// });

vi.mock("@/Layouts/AuthenticatedLayout", () => ({
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    default: (props: any) => <span {...props} />,
}));

vi.mock("@inertiajs/react", () => ({
    Head: vi.fn(),
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    Link: (props: any) => <a {...props} />,
}));

it("has title", () => {
    render(<Dashboard />);
    const strongElement = screen.getByText(/Central de setores/i);
    expect(strongElement).toBeDefined();
});

it("has department link list", () => {
    render(<Dashboard />);

    const lista = screen.getByRole("list", { name: /setores/i });
    const itens = within(lista).getAllByRole("listitem");
    expect(itens).toHaveLength(2);

    [
        [/recepção/i, "/adm/relatorios/recepcao"],
        [/educadores/i, "/adm/relatorios/educadores"],
    ].forEach(function (p) {
        const link = within(lista).getByRole("link", { name: p[0] });
        expect(link).toBeDefined();
        expect(link.getAttributeNode("href")?.value).toEqual(p[1]);
    });
});
