import axios from "../axios";

function Card({service}) {
    const limitedDescription = service.description.substring(0, 20);

    const reserve = async () => {
        try {
            const response = await axios.post('/reservations', {
                service_id: service.id,
                status: 'pending'
            }, {
                headers: {
                    Authorization: `Bearer ${sessionStorage.getItem('token')}`
                }
            });
            console.log(response);
        } catch (error) {
            console.error('Reservation failed!', error.response.data);
        }

    }

  return (
      <div className="blog-card spring-fever">
        <div className="title-content">
          <h3><a href="#">{service.name}</a></h3>
          <div className="intro"> <a href="#">{service.category.name}</a> </div>
        </div>
        <div className="card-info">
        {limitedDescription}...
          <button onClick={reserve}>Reserve<span className="licon icon-arr icon-black"></span></button>
        </div>
        <div className="utility-info">
          <ul className="utility-list">
            <li><span className="licon icon-like"></span><a href="#">{service.price}</a></li>
            {/* <li><span className="licon icon-com"></span><a href="#">12</a></li> */}
            <li><span className="licon icon-dat"></span>{service.created_at}</li>
            {/* <li><span className="licon icon-tag"></span><a href="#">Photos</a>, <a href="#">Nice</a></li> */}
          </ul>
        </div>
        <div className="gradient-overlay"></div>
        <div className="color-overlay"></div>
      </div>


  );
}

export default Card;