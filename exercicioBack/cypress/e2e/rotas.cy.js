describe('Rotas', () => {

    it('verificando se a rota home existe', () => {
        cy.visit('home')

        cy.url().should('include', '/home')
    })

    it('verificando se a rota filmes existe', () => {
        cy.visit('/filmes')

        cy.url().should('include', '/filmes')
    })

    it('verificando se a rota series existe', () => {
        cy.visit('/series')

        cy.url().should('include', '/series')
    })

    it('deve direcionar para rota filmes', () => {
        cy.visit('home')

        cy.get('[href="/filmes"]').click()

        cy.url().should('include', '/filmes')

    })

    it('status da rota filmes deve ser 200', () => {
        cy.request("get", "/api/filmes").then((resposta)=>{
            expect(resposta.status).to.equal(200)
        }
        )
    })

      it('status da rota cadastrar filmes deve ser 200', () => {
        cy.request("post", "/cadastrarFilme", {
            nome: "filme teste",
            personagem: "tom",
            ano: "2026",
            genero: "açao",
            imagem: ""
        }).then((resposta)=>{
            expect(resposta.status).to.equal(200)
        }
        )
    })

    



})






