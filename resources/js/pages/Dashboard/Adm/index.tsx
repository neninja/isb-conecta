import React from 'react'

import { PageInfo } from '@components/PageInfo'
import { Setor } from './Setor'

const linkSetores = [
    {
        name: "Recepção",
        to: "/relatorios/recepcao"
    },
    {
        name: "Educadores",
        to: "/relatorios/educadores"
    },
]

export function Adm() {
    return (
        <>
            <PageInfo
                name="Central de setores"
                setor="Administração"
            >
                Você está cadastrado no setor de Administração, aqui você encontra todas as funções de relatórios disponíveis.
            </PageInfo>
            {linkSetores.map((s, i) => (
                <Setor name={s.name} to={s.to} key={i} />
            ))}
        </>
    )
}
