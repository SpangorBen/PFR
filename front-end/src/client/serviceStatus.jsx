const ServiceStatus = () => {
	return (
		<>
			<div className="container">
				<div className="container-card">
					<div className="header">
						<div className="order-summary">
							<div className="order-status">Arriving date</div>
							<div className="order-date">
								19 April, 2023
							</div>
							<div className="order-day">
								Friday
							</div>
						</div>
						<div className="action-btn">
							<div className="back-btn"><i className="far fa-long-arrow-left"></i></div>
						</div>
					</div>
					<div className="hero-img-container">
						<div className="triangle1"></div>
						<div className="arc"></div>
						<div className="pattern"></div>
						<img src="https://drive.google.com/uc?id=15iXUI6DkRr5Zcp0yH5uF2U47ycr-WzUY" className="hero-img"/>
					</div>
					<div className="order-status-container">
						<div className="status-item first">
							<div className="status-circle"></div>
							<div className="status-text">
								today
							</div>
						</div>
						<div className="status-item second">
							<div className="status-circle"></div>
							<div className="status-text">
								Shipped
							</div>
						</div>
						<div className="status-item">
							<div className="status-circle"></div>
							<div className="status-text green">
							<span>Out</span><span>for delivery</span>
							</div>
						</div>
						<div className="status-item">
							<div className="status-circle"></div>
							<div className="status-text green">
								<span>Ariving</span>
								<span>03&nbsp;-&nbsp;21</span>
							</div>
						</div>
					</div>
					<div className="order-details-container">
						<div className="odc-header">
							<div className="cta-text">See your product details</div>
							<div className="cta-button-container">
								<button className="cta-button">View</button>
							</div>
						</div>
						<div className="odc-wrapper">
							<div className="odc-header-line">
								Your order details
							</div>
							<div className="odc-header-details">
								Your product details (order 040-904-790)
							</div>
							<div className="product-container">
								<div className="product">
								<div className="product-photo">
									<img src="https://s3.eu-central-1.amazonaws.com/sneakerjagers.com/products/396x396/92074.jpg" className="img-photo"/>
								</div>
								<div className="product-desc">
									<span>Nike Air Jordan 1</span>
									<span>9740 INR</span>
								</div>
								</div><div className="product">
								<div className="product-photo">
									<img src="https://s3.eu-central-1.amazonaws.com/sneakerjagers.com/products/396x396/77674.jpg" className="img-photo"/>
								</div>
								<div className="product-desc">
									<span>Alex rider: Never say die Novel 12</span>
									<span>655 INR</span>
								</div>
								</div>
							</div>
							<a href="order-cancellationReqtoken12.netlify.app"><div className="cancellation">
							Request Cancellation
							</div></a>
							<div className="shipping-desc">Your Shipping Address</div>
						
							<div className="shipping-address">
								Mahagun Moderne<br/>
								DELHI<br/>
								201305<br/>
								GAUTAM BUDH NAGAR, GHAZIABAD
							</div>
						</div>
					</div>
				</div>

			</div>
		</>
	);
}
 
export default ServiceStatus;