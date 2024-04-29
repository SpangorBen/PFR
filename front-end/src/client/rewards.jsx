import { useEffect, useState } from "react";
import axios from "../axios";

const Reward = () => {

  const [rewards, setRewards] = useState([]);

	const getRewards = async () => {
    const response = await axios.get('/rewards');
    // console.log(response.data.data);
    setRewards(response.data.data);
  };

  const redeemReward = async (id) => {
    const response = await axios.post(`/redeem-reward/${4}`,{
      headers: {
        Authorization: `Bearer ${sessionStorage.getItem('token')}`,
      },
    });
    console.log(response);
  }

  // getRewards();
  useEffect(() => {
    getRewards();
  }, []);

  return (
    <div className="main-content">
      {/* <h2>Test</h2> */}
      {rewards.map((reward) => (
        <div className="card-reward" key={reward.id}>
          <div className="card-border-top"></div>
          <div className="img"></div>
          <span> {reward.title}</span>
          <p className="job"> {reward.cost} Points</p>
          <button onClick={() => redeemReward(reward.id)}>Redeem</button>
        </div>
      ))}
    </div>
  );
};

export default Reward;
