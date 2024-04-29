import axios from "../axios";

function Card({service, formatDate, openModal}) {

  
    if (!service) {
        return <div>No service data available</div>;
    }
    const limitedDescription = service.description.substring(0, 40);

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

  // handleNvaigation = () => {
  //   Navigate
  // }

  return (
      <div className="blog-card spring-fever">
        <div className="title-content">
          <h3><a href="#">{service.name}</a></h3>
          <div className="intro"> <a href="#">{service.category.name}</a> </div>
        </div>
        <div className="card-info">
        {limitedDescription}...
          <button onClick={openModal}>Reserve<span className="licon icon-arr icon-black"></span></button>
        </div>
        <div className="utility-info">
          <ul className="utility-list">
            <li><span className="licon icon-like"></span>{service.price}</li>
            <li><span className="licon icon-dat"></span>{formatDate(service.created_at)}</li>
          </ul>
        </div>
        <div className="gradient-overlay"></div>
        <div className="color-overlay"></div>
      </div>

  );
}

export default Card;