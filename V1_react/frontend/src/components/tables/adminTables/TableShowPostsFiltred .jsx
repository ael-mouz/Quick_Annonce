import axios from "axios";
import React, { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";
import { confirmAlert } from 'react-confirm-alert';
import 'react-confirm-alert/src/react-confirm-alert.css';


const ShowPosts = () => {
    const [posts, setPosts] = useState([]);
    const location = useLocation();
    const token = location.state.token;
    const id = location.state.id;
    const username = location.state.name;
    const [success, setSuccess] = useState('');

    

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


    const filteredPosts = posts.filter((post) => post.username === username);
    // console.log(filteredPosts)

    // cheking if the array is empty
    if (!Array.isArray(posts)) {
        return <div>Loading...</div>; // Add a loading state or handle the case when users is not an array
    }

    return (
        <>  
            <h3>Mes Annonces</h3>
            {success && <p className="alert alert-success">{success}</p>}
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
                    {filteredPosts.map((post) => (
                        <tr className="text-left" key={post.id}>
                            <td><img src={`../../../../../../backend/public/'${post.picture_1}`}></img> {post.picture_1}</td>
                            <td>{post.title}</td>
                            <td>{post.price}</td>
                            <td>{post.email}</td>
                            <td>{post.city}</td>
                            <td>{(post.created_at).split('T')[0]}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </>
    );
};

export default ShowPosts;
