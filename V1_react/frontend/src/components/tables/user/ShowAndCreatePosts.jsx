import axios from "axios";
import React, { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";
import { confirmAlert } from "react-confirm-alert";
import "react-confirm-alert/src/react-confirm-alert.css";

const CreatePostForm = () => {
    const [formData, setFormData] = useState({
        username: "",
        email: "",
        phone: "",
        category: "",
        city: "",
        description: "",
        title: "",
        price: "",
        picture_1: "",
        picture_2: "",
        picture_3: "",
        picture_4: "",
        picture_5: "",
    });
    const location = useLocation();
    const token = location.state.token;
    const id = location.state.id;
    const [posts, setPosts] = useState([]);

    const handleChange = (event) => {
        const { name, value } = event.target;
        setFormData((prevFormData) => ({
            ...prevFormData,
            [name]: value,
        }));
    };

    // Handel submiting of the data
    const handleSubmit = async (event) => {
        event.preventDefault();

        try {
            const response = await axios.post(
                "http://example.com/api/posts",
                formData
            );
            console.log("Post created:", response.data);
            // Reset form fields after successful submission
            setFormData({
                username: "",
                email: "",
                phone: "",
                category: "",
                city: "",
                description: "",
                title: "",
                price: "",
                picture_1: "",
                picture_2: "",
                picture_3: "",
                picture_4: "",
                picture_5: "",
            });
        } catch (error) {
            console.error("Error creating post:", error);
        }
    };

    //fetching the users data
    useEffect(() => {
        const fetchPosts = async () => {
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/post/findall"
                );
                setPosts(response.data.posts);
            } catch (error) {
                console.error("Error:", error);
            }
        };

        fetchPosts();
    }, []);

    // ---------------------------
    // cheking if the array is empty
    if (!Array.isArray(posts)) {
        return <div>Loading...</div>; // Add a loading state or handle the case when users is not an array
    }

    return (
        <div className="">
            <h2>Creer nouvel annonce</h2>
            <form className="w-100 border p-5" onSubmit={handleSubmit}>
                <div className="form-group">
                    <label htmlFor="username">Username:</label>
                    <input
                        type="text"
                        className="form-control"
                        id="username"
                        name="username"
                        value={formData.username}
                        onChange={handleChange}
                    />
                </div>

                <div className="form-group">
                    <label htmlFor="email">Email:</label>
                    <input
                        type="email"
                        className="form-control"
                        id="email"
                        name="email"
                        value={formData.email}
                        onChange={handleChange}
                    />
                </div>

                <div className="form-group">
                    <label htmlFor="phone">Phone:</label>
                    <input
                        type="tel"
                        className="form-control"
                        id="phone"
                        name="phone"
                        value={formData.phone}
                        onChange={handleChange}
                    />
                </div>

                <div className="form-group">
                    <label htmlFor="category">Category:</label>
                    <select
                        className="form-control"
                        id="category"
                        name="category"
                        value={formData.category}
                        onChange={handleChange}
                    >
                        <option value="">Select Category</option>
                        <option value="Electronics">mashine</option>
                        <option value="Clothing">Immobilier</option>
                        {/* Add more category options as needed */}
                    </select>
                </div>

                <div className="form-group">
                    <label htmlFor="city">City:</label>
                    <input
                        type="text"
                        className="form-control"
                        id="city"
                        name="city"
                        value={formData.city}
                        onChange={handleChange}
                    />
                </div>

                <div className="form-group">
                    <label htmlFor="description">Description:</label>
                    <textarea
                        className="form-control"
                        id="description"
                        name="description"
                        value={formData.description}
                        onChange={handleChange}
                    />
                </div>

                <div className="form-group">
                    <label htmlFor="title">Title:</label>
                    <input
                        type="text"
                        className="form-control"
                        id="title"
                        name="title"
                        value={formData.title}
                        onChange={handleChange}
                    />
                </div>

                <div className="form-group">
                    <label htmlFor="price">Price:</label>
                    <input
                        type="number"
                        className="form-control"
                        id="price"
                        name="price"
                        value={formData.price}
                        onChange={handleChange}
                    />
                </div>

                <div className="form-group">
                    <label htmlFor="picture_1">Picture 1:</label>
                    <input
                        type="text"
                        className="form-control"
                        id="picture_1"
                        name="picture_1"
                        value={formData.picture_1}
                        onChange={handleChange}
                    />
                </div>

                <div className="form-group">
                    <label htmlFor="picture_2">Picture 2:</label>
                    <input
                        type="text"
                        className="form-control"
                        id="picture_2"
                        name="picture_2"
                        value={formData.picture_2}
                        onChange={handleChange}
                    />
                </div>

                <div className="form-group">
                    <label htmlFor="picture_3">Picture 3:</label>
                    <input
                        type="text"
                        className="form-control"
                        id="picture_3"
                        name="picture_3"
                        value={formData.picture_3}
                        onChange={handleChange}
                    />
                </div>

                <div className="form-group">
                    <label htmlFor="picture_4">Picture 4:</label>
                    <input
                        type="text"
                        className="form-control"
                        id="picture_4"
                        name="picture_4"
                        value={formData.picture_4}
                        onChange={handleChange}
                    />
                </div>

                <div className="form-group">
                    <label htmlFor="picture_5">Picture 5:</label>
                    <input
                        type="text"
                        className="form-control"
                        id="picture_5"
                        name="picture_5"
                        value={formData.picture_5}
                        onChange={handleChange}
                    />
                </div>
                <br></br>
                <button type="submit" className="btn btn-primary">
                    Create Post
                </button>
            </form>

            <h2>Annonces</h2>
            <table class="table  table-bordered">
                <thead className="table-primary ">
                    <tr>
                        <th scope="col">image</th>
                        <th scope="col">title</th>
                        <th scope="col">prix</th>
                        <th scope="col">email</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    {posts.map((post) => (
                        <tr className="text-left" key={post.id}>
                            <td>
                                <img
                                    src={`../../../../../../backend/public/'${post.picture_1}`}
                                ></img>{" "}
                                {post.picture_1}
                            </td>
                            <td>{post.title}</td>
                            <td>{post.price}</td>
                            <td>{post.email}</td>
                            <td>{post.city}</td>
                            <td>{post.created_at.split("T")[0]}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default CreatePostForm;
