import { Input } from "@/Components/Input";
import { render, screen } from "@testing-library/react";

it("shows input label", () => {
    render(<Input />);

    expect(screen.getByRole("textbox")).toBeDefined();
});
