import axios from "../axios";
import { useState } from "react";
import { useNavigate } from "react-router-dom";
import { jwtDecode } from "jwt-decode";

const Signup = () => {
  const [SignupData, setSignupData] = useState({
    name: "",
    email: "",
    password: "",
    role_id: 2,
  });

  const [activeButton, setActiveButton] = useState("");

  const navigate = useNavigate();

  const handleInputChange = (e) => {
    setSignupData({ ...SignupData, [e.target.name]: e.target.value });
    setActiveButton(e.target.id);
  };

  const handleSignupSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.post("/register", SignupData);
      const token = response.data.authorisation.token;
      sessionStorage.setItem("token", token);
      sessionStorage.setItem("logged", true);
      // console.log(SignupData);
      // const decodedToken = jwtDecode(token);
      // console.log(decodedToken.role);
      if (token) {
        navigate(`/`);
      }
    } catch (error) {
      console.error("Signup failed!", error.response.data);
    }
  };

  return (
    <div className="py-16 w-full">
      <div className="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
        <div
          className="hidden lg:block lg:w-1/2 bg-cover"
          style={{
            backgroundImage:
              "url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')",
          }}
        ></div>
        <div className="w-full p-8 lg:w-1/2">
          <h2 className="text-2xl font-semibold text-gray-700 text-center">
            Benz's
          </h2>
          <p className="text-xl text-gray-600 text-center">Welcome new user!</p>
          <form onSubmit={handleSignupSubmit}>
            <div className="flex justify-center items-center mt-10 mb-5">
              <input
                type="radio"
                id="worker"
                name="role_id"
                value={3}
                className="hidden"
                onChange={handleInputChange}
              />
              <label
                htmlFor="worker"
                className={`bg-white border-2 border-blue-500 text-black rounded-md py-2 cursor-pointer transition-colors duration-300 ease-in-out px-12 mr-6 
                  ${
                    activeButton === "worker"
                      ? " text-white bg-blue-500"
                      : "hover:bg-blue-500 hover:text-white"
                  }`}
              >
                Worker
              </label>

              <input
                type="radio"
                id="user"
                name="role_id"
                value={2}
                className="hidden"
                onChange={handleInputChange}
              />
              <label
                htmlFor="user"
                className={`text-black bg-white border-2 border-blue-500  rounded-md py-2 cursor-pointer transition-colors duration-300 ease-in-out px-12 mr-6 
                  ${
                    activeButton === "user"
                      ? " text-white bg-blue-500"
                      : "hover:bg-blue-500 hover:text-white"
                  }`}
              >
                Client
              </label>
            </div>
            <div className="mt-4">
              <label className="block text-gray-700 text-sm font-bold mb-2">
                Full Name
              </label>
              <input
                className="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                type="text"
                name="name"
                value={SignupData.name}
                onChange={handleInputChange}
                required
              />
            </div>
            <div className="mt-4">
              <label className="block text-gray-700 text-sm font-bold mb-2">
                Email Address
              </label>
              <input
                className="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                type="email"
                name="email"
                value={SignupData.email}
                onChange={handleInputChange}
                required
              />
            </div>
            <div className="mt-4">
              <div className="flex justify-between">
                <label className="block text-gray-700 text-sm font-bold mb-2">
                  Password
                </label>
                <a href="#" className="text-xs text-gray-500">
                  Forget Password?
                </a>
              </div>
              <input
                className="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                type="password"
                name="password"
                value={SignupData.password}
                onChange={handleInputChange}
                required
              />
            </div>
            <div className="mt-8">
              <button className="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">
                Sign Up
              </button>
            </div>
          </form>
          <div className="mt-4 flex items-center justify-between">
            <span className="border-b w-1/5 md:w-1/4"></span>
            <a href="#" className="text-xs text-gray-500 uppercase">
              or sign In
            </a>
            <span className="border-b w-1/5 md:w-1/4"></span>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Signup;
