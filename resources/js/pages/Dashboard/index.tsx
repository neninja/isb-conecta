import React from 'react'

import { Main } from '@components/Main'
import { Adm } from '@pages/Dashboard/Adm'

const dashboards = {
    1: <Adm/>
}

export function Dashboard() {
    return (
        <Main>
            {dashboards[1]}
        </Main>
    )
}
