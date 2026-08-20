//.to.be.lessThan =  um e menor que outro
//.to.be.eq = se são iguais
//to.be.lte = menor ou igual
//to.be.gte = maior ou igual
//getBoundingClientRect() = pega o tamanho do elemento na tela

describe("testando responsividade", () => {

    const todasTelas = [
        [414, 896],
        [820, 1180],
        [1280, 800]
    ]
    const telasMaiores = [
        [820, 1180],
        [1280, 800]
    ]

        //testes em tela de home
        
    it("teste responsividade menu telefone", () => {
        cy.viewport(414, 896)
        cy.visit("/home")
        cy.get('[href="/home"]').should("be.visible")
        cy.get('[href="/filmes"]').should("be.visible")
        cy.get('[href="/series"]').should("be.visible")
        cy.get('.cabecalho').should("not.be.visible")
    })

      telasMaiores.forEach(([largura, altura]) => {
        it(`teste responsividade menu telefone ${largura}x${altura}` , () => {
        cy.viewport(largura, altura)
        cy.visit("/home")
        cy.get('[href="/home"]').should("be.visible")
        cy.get('[href="/filmes"]').should("be.visible")
        cy.get('[href="/series"]').should("be.visible")
    })
      })


    it("teste responsividade cards devem estar um embaixo do outro", () => {
        cy.viewport(414, 896)
        cy.visit("/home")
        cy.get('.card').then($card => {
            const card1 = $card[0].getBoundingClientRect();
            const card2 = $card[1].getBoundingClientRect();

            //verifica se card2 e menor que card1 na altura
            expect(card1.top).to.be.lessThan(card2.top)
        })
    })

    it("teste responsividade cards devem estar a esquerda em uma coluna unica", () => {
        cy.viewport(414, 896)
        cy.visit("/home")
        cy.get('.card').then($card => {
            const card1 = $card[0].getBoundingClientRect();
            const card2 = $card[1].getBoundingClientRect();

            expect(card1.left).to.be.eq(card2.left)
        })
    })

    //criando função para pegar o seletor (tipo do objeto) e o genero que e o esperado ter dentro
    const validarGeneroCard = (seletor, genero) => {
        cy.get(seletor).should("be.visible")
    }

    //testando em diferentes tamanhos de telas
    todasTelas.forEach(([largura, altura]) => {

        it(`conteudo genero deve estar disponivel ${largura}x${altura}`, () => {
            cy.viewport(largura, altura)
            cy.visit("/home")

            validarGeneroCard(":nth-child(1) > .informacoes > .genero")
            validarGeneroCard(":nth-child(2) > .informacoes > .genero")
            validarGeneroCard(":nth-child(4) > .informacoes > .genero")

        })
    })
    const validarNomeCard = (seletor, genero) => {
        cy.get(seletor).should("be.visible")
    }

    todasTelas.forEach(([largura, altura]) => {

        it(`conteudo nome esta visivel no card ${largura}x${altura}`, () => {
            cy.viewport(largura, altura)
            cy.visit("/home")

            validarNomeCard(":nth-child(1) > .informacoes > h2")
            validarNomeCard(":nth-child(2) > .informacoes > h2")

        })
    })

    it("nome não deve passar do tamanho visivel", () => {
        cy.viewport(414, 896)
        cy.visit("/home")

        cy.get("card-nome").should((nomes) => {
            nomes.each((index, elemento) => {

                const tamanhoRealdoTexto = elemento.clientWidth
                const tamanhoVisivel = elemento.scrollWidth

                expect(tamanhoRealdoTexto).to.be.lessThan(tamanhoVisivel + 1)

            })
        })

    })
     todasTelas.forEach(([largura, altura]) => {
        it(` campos inputs devem ser menor ou igual ao tamanho do card que estão dentro ${largura}x${altura}`, () => {
            cy.viewport(largura, altura)
            cy.visit("/home")

            cy.get('.adicionaFilmes').click()

            cy.get('.formCard').then((card) => {
                const tamanhoCard = card[0].getBoundingClientRect().width

                cy.get('input').then((input) => {
                    const tamanhoInput = input[0].getBoundingClientRect().width


                    expect(tamanhoInput).to.be.lte(tamanhoCard)
                })

            })

        })
    })


        //testes em tela de adicionar filme


    const validarInput = (seletor) => {
        cy.get(seletor).should("be.visible")
    }

    todasTelas.forEach(([largura, altura]) => {

        it(`campos inputs devem ser visiveis ${largura}x${altura}`, () => {
            cy.viewport(largura, altura)
            cy.visit("/adicionarFilme")

            validarInput('input[name="nome"]')
            validarInput('[name="ano"]')
            validarInput('[name="genero"]')
            validarInput('input[name="personagem"]')
        })
    })

    todasTelas.forEach(([largura, altura]) => {
        it(`os botoes devem ser menor ou igual ao tamanho do card que estão dentro ${largura}x${altura}`, () => {
            cy.viewport(largura, altura)
            cy.visit("/adicionarFilme")

            cy.get('.formCard').then((card) => {
                const tamanhoCard = card[0].getBoundingClientRect().width

                cy.get("button").then((button) => {
                    const tamanhoButton = button[0].getBoundingClientRect().width

                    expect(tamanhoButton).to.be.lte(tamanhoCard)
                })

            })

        })
    })


        //teste em tela de series


    const atributosVisiveis = (seletor)=>{
        cy.get(seletor).should("be.visible")
    }

     todasTelas.forEach(([largura, altura]) => {

           it(`atributos do card devem estar visiveis ${largura}x${altura}`, () => {
            cy.viewport(largura, altura)
            cy.visit("/series")

            atributosVisiveis(".nome")
            atributosVisiveis(".ano")
            atributosVisiveis(".genero")
            atributosVisiveis(".temporada")
            atributosVisiveis(".personagem")
            atributosVisiveis(".buttonExcluir")


        })
     })


})