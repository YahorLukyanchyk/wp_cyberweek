const matchesBlock = document.querySelector(".matches-block");
var templateUrl = object_name.templateUrl;

matchesBlock.innerHTML = `
<div class="matches__loading">
<img src="${templateUrl}/assets/img/loading.gif">
</div>
`;

async function getMatchesInfo() {
  let responseResult;
  const options = {
    method: "GET",
    headers: {
      "X-RapidAPI-Key": "0eea16a874mshb080af88d4c8369p145af5jsn1121c04043a8",
      "X-RapidAPI-Host": "csgo-matches-and-tournaments.p.rapidapi.com",
    },
  };

  await fetch(
    "https://csgo-matches-and-tournaments.p.rapidapi.com/matches",
    options
  )
    .then((response) => response.json())
    .then((response) => (responseResult = response))
    .catch((err) => console.error(err));

  for (let i = 0; i < responseResult.data.length; i++) {
    if (responseResult.data[i].team_lose.image_url == null) {
      responseResult.data[i].team_lose.image_url = `${templateUrl}/assets/img/nologo.svg`;
    }
    if (responseResult.data[i].team_won.image_url == null) {
      responseResult.data[i].team_won.image_url = `${templateUrl}/assets/img/nologo.svg`;
    }
  }

  matchesBlock.innerHTML = `
                  <h2 class="matches-block__heading">Матчи онлайн</h2>
                    <div class="matches__list">
                      <div class="matches__item-wrapper">
                        <div class="matches__item">
                          <div class="matches__heading">
                            <img
                              src="${templateUrl}/assets/img/game=csgo.svg"
                              alt=""
                              class="matches__game-img"
                            />
                            <span class="macthes__game-name">CS:GO</span>
                          </div>
                          <div class="matches__teams team">
                            <div class="team__wrapper">
                              <div class="team__block">
                                <img src="${responseResult.data[0].team_won.image_url}" alt="" class="team__logo" />
                                <div class="team__info">
                                  <span class="team__name">${responseResult.data[0].team_won.title}</span>
                                  <span class="team__score">${responseResult.data[0].score_won}</span>
                                </div>
                              </div>
                              <div class="team__block">
                                <img src="${responseResult.data[0].team_lose.image_url}" alt="" class="team__logo" />
                                <div class="team__info">
                                  <span class="team__name">${responseResult.data[0].team_lose.title}</span>
                                  <span class="team__score">${responseResult.data[0].score_lose}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="matches__item-wrapper">
                        <div class="matches__item">
                          <div class="matches__heading">
                            <img
                              src="${templateUrl}/assets/img/game=csgo.svg"
                              alt=""
                              class="matches__game-img"
                            />
                            <span class="macthes__game-name">CS:GO</span>
                          </div>
                          <div class="matches__teams team">
                            <div class="team__wrapper">
                              <div class="team__block">
                                <img src="${responseResult.data[1].team_won.image_url}" alt="" class="team__logo" />
                                <div class="team__info">
                                  <span class="team__name">${responseResult.data[1].team_won.title}</span>
                                  <span class="team__score">${responseResult.data[1].score_won}</span>
                                </div>
                              </div>
                              <div class="team__block">
                                <img src="${responseResult.data[1].team_lose.image_url}" alt="" class="team__logo" />
                                <div class="team__info">
                                  <span class="team__name">${responseResult.data[1].team_lose.title}</span>
                                  <span class="team__score">${responseResult.data[1].score_lose}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="matches__item-wrapper">
                        <div class="matches__item">
                          <div class="matches__heading">
                            <img
                              src="${templateUrl}/assets/img/game=csgo.svg"
                              alt=""
                              class="matches__game-img"
                            />
                            <span class="macthes__game-name">CS:GO</span>
                          </div>
                          <div class="matches__teams team">
                            <div class="team__wrapper">
                              <div class="team__block">
                                <img src="${responseResult.data[2].team_won.image_url}" alt="" class="team__logo" />
                                <div class="team__info">
                                  <span class="team__name">${responseResult.data[2].team_won.title}</span>
                                  <span class="team__score">${responseResult.data[2].score_won}</span>
                                </div>
                              </div>
                              <div class="team__block">
                                <img src="${responseResult.data[2].team_lose.image_url}" alt="" class="team__logo" />
                                <div class="team__info">
                                  <span class="team__name">${responseResult.data[2].team_lose.title}</span>
                                  <span class="team__score">${responseResult.data[2].score_lose}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="matches__all-wrapper">
                      <a href="#" class="matches__all">Все матчи</a>
                    </div>
        `;
}

getMatchesInfo();
